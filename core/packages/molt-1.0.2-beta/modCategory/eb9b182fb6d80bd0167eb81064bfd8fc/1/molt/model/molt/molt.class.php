<?php
/**
 * This file is the main class file for Molt (minimization and optimization of load time).
 *
 * @copyright Copyright (C) 2014, MakeBeCool <developers@makebecool.com>
 * @author Gadashevich Andrei <gav.andrei@makebecool.com>
 * @package Molt
 */
class Molt {
    /**
     * A reference to the modX object.
     * @var modX $modx
     */
    public $modx = null;

    function __construct(modX &$modx,array $config = array()) {
        $this->modx =& $modx;

        $corePath = $this->modx->getOption('molt_core_path', $config, $this->modx->getOption('core_path') . 'components/molt/');
        $assetsPath = $this->modx->getOption('molt_assets_path', $config, $this->modx->getOption('assets_path') .'components/molt/');
        $assetsUrl = $this->modx->getOption('molt_assets_url', $config, $this->modx->getOption('assets_url') . 'components/molt/');

        $this->config = array_merge(array(
            'assetsUrl' => $assetsUrl
            ,'assetsPath' => $assetsPath
            ,'cacheFolder' => $assetsPath.'pack/'
            ,'cacheFolderUrl' => $assetsUrl.'pack/'

            ,'cssFilename' => 'styles'
            ,'cssSources' => ''
            ,'cssPack' => 1

            ,'jsFilename' => 'scripts'
            ,'jsSources' => ''
            ,'jsPack' => 1

        ),$config);
        if (!empty($config['jsSources'])) {$this->config['jsSources'] = explode(',', str_replace("\n",'', trim($config['jsSources'])));}
        if (!empty($config['cssSources'])) {$this->config['cssSources'] = explode(',', str_replace("\n",'', trim($config['cssSources'])));}
        if (!empty($config['cacheFolder'])) {
            if(!$this->prepareCacheFolder()){
                $modx->log(modX::LOG_LEVEL_ERROR, '[Molt] Could not create cache dir "'.$this->config['cacheFolder'].'"');
                return false;
            }
            $this->config['cacheFolderUrl'] = str_replace('//','/', MODX_BASE_URL.$config['cacheFolder']);
            $this->config['cacheFolder'] = str_replace('//','/', MODX_BASE_PATH.$config['cacheFolder']);
        } else {
            $this->config['cacheFolder'] = $assetsPath;
        }
        if(MODX_BASE_URL != '/'){
            $this->config['cacheFolder'] = str_replace(MODX_BASE_URL, '/', trim($this->config['cacheFolder']));
            $this->config['cacheFolderUrl'] = str_replace(MODX_BASE_URL, '/', trim($this->config['cacheFolderUrl']));
        }
        if(!$this->processDeferredFunction()) {
            return false;
        }

        $this->config['jsExt'] = $this->config['jsPack'] ? '.pack.js' : '.js';
        $this->config['cssExt'] = $this->config['cssPack'] ? '.pack.css' : '.css';

        $files = scandir($this->config['cacheFolder'], 1);
        $jsExt = str_replace('.','\.',$this->config['jsExt']);
        $cssExt = str_replace('.','\.',$this->config['cssExt']);
        $jsExpr = '('.$this->config['jsFilename'].'_(\d){10})'.$jsExt;
        $cssExpr = '('.$this->config['cssFilename'].'_(\d){10})'.$cssExt;

        foreach ($files as $v) {
            if ($v == '.' || $v == '..') {continue;}

            if (@preg_match("/^$jsExpr$/iu", $v, $matches)) {
                // delete old js file if exists
                if (!empty($this->config['jsFile'])) {
                    unlink($this->config['cacheFolder'].$v);
                    continue;
                }
                $this->config['jsFile'] = $matches[1];
            } else if (@preg_match("/^$cssExpr$/iu", $v, $matches)) {
                // delete old css file if exists
                if (!empty($this->config['cssFile'])) {
                    unlink($this->config['cacheFolder'].$v);
                    continue;
                }
                $this->config['cssFile'] = $matches[1];
            }
        }
        if (empty($this->config['jsFile'])) {$this->config['jsFile'] = $this->config['jsFilename'];}
        if (empty($this->config['cssFile'])) {$this->config['cssFile'] = $this->config['cssFilename'];}
        return true;
    }

    /**
     * Does the actual minifying, combining files and setting placeholders
     *
     * @access public
     * @return array
     */
    public function minify() {
        $output = array(
            'js' => '',
            'css' => ''
        );
        //Javascript
        if ($jsFile = $this->processFiles('js')) {
            $output['js'] = $this->config['cacheFolderUrl'].$jsFile;
        }

        //CSS
        if ($cssFile = $this->processFiles('css')) {
            $output['css'] = $this->config['cacheFolderUrl'].$cssFile;
        }

        return $output;
    }

    /**
     * Check and create (if need) Molt js or css file
     *
     * @param $type string 'css' or 'js'
     * @access public
     * @return boolean|string
     */
    public function processFiles($type) {
        if($type !== 'js' && $type !== 'css') {
            return false;
        }

        $file = $this->config['cacheFolder'].$this->config[$type.'File'].$this->config[$type.'Ext'];
        $output = '';
        $maxtime = 0;
        foreach($this->config[$type.'Sources'] as $source) {
            if(MODX_BASE_URL != '/'){
                $source = str_replace(MODX_BASE_URL, '/', trim($source));
            }
            $source = str_replace('//', '/', MODX_BASE_PATH.trim($source));
            if (is_file($source)) {
                $output .= file_get_contents($source)."\n";
                $filetime = filemtime($source);
                if ($filetime > $maxtime) {$maxtime = $filetime;}
            } else {
                $this->modx->log(modX::LOG_LEVEL_ERROR, '[Molt] Could not find file: '.$source);
            }
        }
        if (is_file($file)) {
            $mintime = filemtime($file);
            if ($mintime > $maxtime) {
                return $this->config[$type.'File'].$this->config[$type.'Ext'];
            }
        }
        if ($this->config[$type.'Pack']) {
            if($type == 'js') {
                require_once 'jsmin.class.php';
                $output = JSMin::minify($output);
            } elseif ($type == 'css') {
                require_once 'cssmin.class.php';
                $output = Minify_CSS_Compressor::process($output);
            }
        }

        if (!file_put_contents($file, $output)) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, '[Molt] Could not write '.$type.' cache file!');
            return false;
        }
        $newname = $this->config[$type.'Filename'].'_'.time().$this->config[$type.'Ext'];
        rename($file, $this->config['cacheFolder'].$newname);
        return $newname;
    }

    /**
     * Check and create pack file deferredfunctions
     *
     */
    private function processDeferredFunction() {
        $file = $this->config['assetsPath'].'js/deferredfunctions.pack.js';
        $source = $this->config['assetsPath'].'js/deferredfunctions.js';
        $output = '';
        $maxtime = 0;
        if (is_file($source)) {
            $output .= file_get_contents($source)."\n";
            $filetime = filemtime($source);
            if ($filetime > $maxtime) {$maxtime = $filetime;}
        } else {
            $this->modx->log(modX::LOG_LEVEL_ERROR, '[Molt] Could not find file: '.$source);
        }

        if (is_file($file)) {
            $mintime = filemtime($file);
            if ($mintime > $maxtime) {
                $this->config['deferredfunctions'] = $this->config['assetsUrl'].'js/deferredfunctions.pack.js';
                return true;
            }
        }

        require_once 'jsmin.class.php';
        $output = JSMin::minify($output);

        if (!file_put_contents($file, $output)) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, '[Molt] Could not write deferredfunction cache file!');
            return false;
        }
        $this->config['deferredfunctions'] = $this->config['assetsUrl'].'js/deferredfunctions.pack.js';
        return true;
    }

    /**
     * Checks and creates cache dir for storing prepared scripts and styles
     * @return bool|string
     */
    public function prepareCacheFolder() {
        $path = trim(str_replace(MODX_BASE_PATH, '', trim($this->config['cacheFolder'])), '/');

        if (!file_exists(MODX_BASE_PATH . $path)) {
            $this->makeDir($path);
        }

        if (substr($path, -1) !== '/') {
            $path .= '/';
        }

        $this->config['cacheFolder'] = MODX_BASE_PATH . $path;
        return file_exists($this->config['cacheFolder']);
    }



    /**
     * Get the latest cached files for current options
     *
     * @param string $prefix
     * @param string $extension
     *
     * @return array
     */
    public function getCachedFiles($prefix = '', $extension = '') {
        $cached = array();

        $regexp = $prefix;
        $regexp .= '((\d){10}).*';
        if (!empty($extension)) {
            $regexp .= '?' . str_replace('.', '\.', $extension);
        }

        $files = scandir($this->config['cacheFolder']);
        foreach ($files as $file) {
            if (preg_match("/$regexp/i", $file, $matches)) {
                $cached[] = $file;
            }
        }

        return $cached;
    }

    /**
     * Recursive create of directories by specified path
     * @param $path
     * @return bool
     */
    public function makeDir($path = '') {
        if (empty($path)) {return false;}
        elseif (file_exists($path)) {return true;}

        $tmp = explode('/', str_replace(MODX_BASE_PATH, '', $path));
        $path = MODX_BASE_PATH;
        foreach ($tmp as $v) {
            if (!empty($v)) {
                $path .= $v . '/';
                if (!file_exists($path)) {
                    mkdir($path);
                }
            }
        }
        return file_exists($path);
    }

    /**
     * Removes cache files
     * @return bool
     */
    public function clearCache() {
        if ($this->prepareCacheFolder()) {
            $cached = $this->getCachedFiles();
            foreach ($cached as $file) {
                unlink($this->config['cacheFolder'] . $file);
            }
        }

        return false;
    }
}