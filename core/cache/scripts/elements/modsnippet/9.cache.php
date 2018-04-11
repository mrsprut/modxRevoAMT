<?php  return '/**
 * molt
 *
 * A minimization js/css and optimization of load time snippet for MODX 2.x.
 *
 * @copyright Copyright (C) 2014, MakeBeCool <developers@makebecool.com>
 * @author Gadashevich Andrei <gav.andrei@makebecool.com>
 * @package Molt
 *
 * TEMPLATES
 *
 * tpl - Template with basic variables JS [default=moltVar]
 *
 * OPTIONS
 *
 * cacheFolder - (Opt) The folder to the cache files from the site base URL
 * cssFilename - (Opt) Base name for the CSS file [default=styles]
 * cssSources - (Opt) List of comma-separated CSS files to be processed
 * cssPack - (Opt) Enable Minification CSS? [default=true]
 * cssDeferred - (Opt) Lazy loading CSS file after loading the page [default=false]
 * cssPlaceholder - (Opt) Name placeholder css. Used if &registerCss=`placeholder` [default=Molt.css]
 * cssRegister - (Opt) Connection CSS : You can save the placeholder (placeholder) or cause the tag "head" (default)
 * [default=default]
 * jsFilename - (opt) Base name for the JS file [default=scripts]
 * jsSources - (Opt) List of comma-separated JS files to be processed
 * jsPack - (Opt) Enable Minification JS [default=true]
 * jsDeferred - (Opt) Lazy loading JS file after loading the page [default=true]
 * jsPlaceholder - (Opt) Name placeholder javascript. Used if &registerJs=`placeholder` [default=Molt.js]
 * jsRegister - (Opt) Connection javascript: You can save the placeholder (placeholder), cause the tag "head" (startup)
 * or put before the closing "body" (default) [default=default]
 * incjQuery - (Opt) Separately connect the jQuery library from the CDN [default=true]
 *
 */

/** @var array $scriptProperties */
if (!$modx->getService(\'molt\',\'Molt\',$modx->getOption(\'molt_core_path\',null,$modx->getOption(\'core_path\').\'components/molt/\').\'model/molt/\',$scriptProperties)) {return;}
/** @var Molt $Molt */
if (!$Molt = new Molt($modx, $scriptProperties)) {
    return;
}

$files = $Molt->minify();

//CSS
$cssRegister = $Molt->config[\'cssRegister\'];
$cssPlaceholder = !empty($Molt->config[\'cssPlaceholder\']) ? $Molt->config[\'cssPlaceholder\'] : \'\';
if($cssRegister == \'placeholder\' && $cssPlaceholder) {
    $tag = \'<link rel="stylesheet" href="\' . $files[\'css\'] . \'" type="text/css" />\';
    $modx->setPlaceholder($cssPlaceholder, $tag);
} elseif($cssRegister == \'head\' || !$Molt->config[\'cssDeferred\']) {
    $modx->regClientCSS($files[\'css\']);
}

//JS
$jsRegister = $Molt->config[\'jsRegister\'];
$jsPlaceholder = !empty($Molt->config[\'jsPlaceholder\']) ? $Molt->config[\'jsPlaceholder\'] : \'\';

$properties = array(
    \'jsDeferred\' => $Molt->config[\'jsDeferred\'] ? 1 : 0
    ,\'cssDeferred\' => $Molt->config[\'cssDeferred\'] ? 1 : 0
    ,\'jsUrl\' => $files[\'js\']
    ,\'cssUrl\' => $files[\'css\']
);
$deferred = ($Molt->config[\'jsDeferred\'] || $Molt->config[\'cssDeferred\']) ? 1 : 0;
$jsVar = $modx->getChunk($Molt->config[\'tpl\'],$properties);

if($jsRegister == \'placeholder\' && $jsPlaceholder) {
    $tag = \'<script src="\' . $files[\'js\'] . \'"></script>\';
    $modx->setPlaceholder($cssPlaceholder, $tag);
} elseif($jsRegister == \'startup\') {
    $modx->regClientStartupHTMLBlock($jsVar);
    if($Molt->config[\'incjQuery\']) {
        $modx->regClientStartupScript(\'//code.jquery.com/jquery-1.11.0.min.js\');
    }
    if($deferred) {
        $modx->regClientStartupScript($Molt->config[\'deferredfunctions\']);
    } else {
        $modx->regClientStartupScript($files[\'js\']);
    }
} else {
    $modx->regClientHTMLBlock($jsVar);
    if($Molt->config[\'incjQuery\']) {
        $modx->regClientScript(\'//code.jquery.com/jquery-1.11.0.min.js\');
    }
    if($deferred) {
        $modx->regClientScript($Molt->config[\'deferredfunctions\']);
    } else {
        $modx->regClientScript($files[\'js\']);
    }
}
return;
';