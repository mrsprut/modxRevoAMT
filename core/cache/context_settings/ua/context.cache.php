<?php  return array (
  'config' => 
  array (
    'base_url' => '/ua/',
    'cultureKey' => 'ua',
    'site_start' => '32',
    'site_url' => 'http://localhost/ua/',
  ),
  'resourceMap' => 
  array (
    0 => 
    array (
      0 => 32,
      1 => 33,
      2 => 39,
      3 => 41,
      4 => 44,
    ),
    33 => 
    array (
      0 => 34,
      1 => 35,
      2 => 36,
      3 => 37,
    ),
    39 => 
    array (
      0 => 38,
      1 => 40,
      2 => 57,
      3 => 58,
      4 => 59,
      5 => 60,
    ),
    41 => 
    array (
      0 => 42,
      1 => 43,
    ),
    44 => 
    array (
      0 => 45,
      1 => 49,
      2 => 53,
    ),
    45 => 
    array (
      0 => 46,
      1 => 47,
      2 => 48,
    ),
    49 => 
    array (
      0 => 50,
      1 => 51,
      2 => 52,
    ),
    53 => 
    array (
      0 => 54,
      1 => 55,
      2 => 56,
    ),
  ),
  'aliasMap' => 
  array (
    'index' => 32,
    'examples' => 33,
    'specialists' => 39,
    'services' => 41,
    'history' => 44,
    'examples/avtovoz' => 34,
    'examples/cyclone4' => 35,
    'examples/train-traktor' => 36,
    'examples/kran' => 37,
    'specialists/michael-chaban' => 38,
    'specialists/elena-podtykan' => 40,
    'specialists/aleksandr-parshikov' => 57,
    'specialists/denis-mikhaylitskiy' => 58,
    'specialists/muntyan-ekaterina' => 59,
    'specialists/yurii-trofimenko' => 60,
    'services/test' => 42,
    'services/technical-diagnosis' => 43,
    'history/foundation' => 45,
    'history/as-part-of-azovmash' => 49,
    'history/independent-test-center' => 53,
    'history/foundation/foundation1' => 46,
    'history/foundation/foundation2' => 47,
    'history/foundation/foundation3' => 48,
    'history/as-part-of-azovmash/as-part-of-azovmash1' => 50,
    'history/as-part-of-azovmash/as-part-of-azovmash2' => 51,
    'history/as-part-of-azovmash/as-part-of-azovmash3' => 52,
    'history/independent-test-center/1' => 54,
    'history/independent-test-center/2' => 55,
    'history/independent-test-center/3' => 56,
  ),
  'webLinkMap' => 
  array (
  ),
  'eventMap' => 
  array (
    'OnBeforeCacheUpdate' => 
    array (
      2 => '2',
    ),
    'OnContextRemove' => 
    array (
      3 => '3',
    ),
    'OnDocFormPrerender' => 
    array (
      3 => '3',
    ),
    'OnDocFormSave' => 
    array (
      3 => '3',
      6 => '6',
    ),
    'OnEmptyTrash' => 
    array (
      6 => '6',
      3 => '3',
    ),
    'OnHandleRequest' => 
    array (
      1 => '1',
      15 => '15',
    ),
    'OnPageNotFound' => 
    array (
      6 => '6',
    ),
    'OnResourceDuplicate' => 
    array (
      3 => '3',
    ),
    'OnSiteRefresh' => 
    array (
      14 => '14',
      6 => '6',
    ),
    'OnWebPageComplete' => 
    array (
      6 => '6',
    ),
    'OnWebPagePrerender' => 
    array (
      6 => '6',
    ),
  ),
  'pluginCache' => 
  array (
    1 => 
    array (
      'id' => '1',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'lowerCaseUrl',
      'description' => '',
      'editor_type' => '0',
      'category' => '1',
      'cache_type' => '0',
      'plugincode' => '/**
 * Плагин для переадресации с url с UpperCase на LoverCase
 */
$eventName = $modx->event->name;

switch($eventName) {
    case \'OnHandleRequest\':
        if($modx->context->get(\'key\') != "mgr"){
            if(isset($_GET[\'rewrite-strtolower-url\'])) {
                $url = $_GET[\'rewrite-strtolower-url\'];
                unset($_GET[\'rewrite-strtolower-url\']);
                $params = http_build_query($_GET);
                if(strlen($params)) {
                    $params = \'?\' . $params;
                }
                $modx->sendRedirect(\'http://\' . $_SERVER[\'HTTP_HOST\'] . \'/\' . strtolower($url) . $params, array(\'responseCode\' => \'HTTP/1.1 301 Moved Permanently\'));
            }
        }
        break;
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '1',
      'static_file' => 'assets/basetheme-elements/plugins/lowerCaseUrl.php',
    ),
    2 => 
    array (
      'id' => '2',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'clearCache',
      'description' => '',
      'editor_type' => '0',
      'category' => '1',
      'cache_type' => '0',
      'plugincode' => '$eventName = $modx->event->name;
switch($eventName) {
    case \'OnBeforeCacheUpdate\':
        $options = array(\'objects\' => null, \'extensions\' => array(\'.php\', \'.log\'));
        $modx->cacheManager->clearCache(array(\'baseThemeCache/\'),$options);

        break;
}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '1',
      'static_file' => 'assets/basetheme-elements/plugins/clearCache.php',
    ),
    3 => 
    array (
      'id' => '3',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'Babel',
      'description' => 'Links and synchronizes multilingual resources.',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '/**
 * Babel
 *
 * Copyright 2010 by Jakob Class <jakob.class@class-zec.de>
 *
 * This file is part of Babel.
 *
 * Babel is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * Babel is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Babel; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package babel
 */
/**
 * Babel Plugin to link and synchronize multilingual resources
 * 
 * Based on ideas of Sylvain Aerni <enzyms@gmail.com>
 *
 * Events:
 * OnDocFormPrerender,OnDocFormSave,OnEmptyTrash,OnContextRemove,OnResourceDuplicate
 *
 * @author Jakob Class <jakob.class@class-zec.de>
 *         goldsky <goldsky@virtudraft.com>
 * 
 * @package babel
 * 
 */

$babel = $modx->getService(\'babel\',\'Babel\',$modx->getOption(\'babel.core_path\',null,$modx->getOption(\'core_path\').\'components/babel/\').\'model/babel/\');

/* be sure babel TV is loaded */
if (!($babel instanceof Babel) || !$babel->babelTv) return;

switch ($modx->event->name) {
	case \'OnDocFormPrerender\':
		$output = \'\';
		$errorMessage = \'\';
		$resource =& $modx->event->params[\'resource\'];
		if(!$resource) {
			/* a new resource is being to created
			 * -> skip rendering the babel box */
			break;
		}
		$linkedResources = $babel->getLinkedResources($resource->get(\'id\'));
		if(empty($linkedResources)) {
			/* always be sure that the Babel TV is set */
			$babel->initBabelTv($resource);
		}

		/* create babel-box with links to translations */
		$outputLanguageItems = \'\';
        if (!$modx->lexicon) {
            $modx->getService(\'lexicon\',\'modLexicon\');
        }
        $languagesStore = array();
		$contextKeys = $babel->getGroupContextKeys($resource->get(\'context_key\'));
		foreach($contextKeys as $contextKey) {
			/* for each (valid/existing) context of the context group a button will be displayed */
			$context = $modx->getObject(\'modContext\', array(\'key\' => $contextKey));
			if(!$context) {
				$modx->log(modX::LOG_LEVEL_ERROR, \'Could not load context: \'.$contextKey);
				continue;
			}
			$context->prepare();
			$cultureKey = $context->getOption(\'cultureKey\',$modx->getOption(\'cultureKey\'));
            $languagesStore[] = array($modx->lexicon(\'babel.language_\'.$cultureKey)." ($contextKey)", $contextKey);
        }
		
        $babel->config[\'context_key\'] = $resource->get(\'context_key\');
        $babel->config[\'languagesStore\'] = $languagesStore;
        $babel->config[\'menu\'] = $babel->getMenu($resource);

        $version = str_replace(\' \', \'\', $babel->config[\'version\']);
        $isCSSCompressed = $modx->getOption(\'compress_css\');
        $withVersion = $isCSSCompressed ? \'\' : \'?v=\'.$version;
        $modx->controller->addCss($babel->config[\'cssUrl\'].\'babel.css\'.$withVersion);

        $modx->controller->addLexiconTopic(\'babel:default\');
        $isJsCompressed = $modx->getOption(\'compress_js\');
        $withVersion = $isJsCompressed ? \'\' : \'?v=\'.$version;
        $modx->controller->addJavascript($babel->config[\'jsUrl\'].\'babel.class.js\'.$withVersion);
        $modx->controller->addHtml(\'
<script type="text/javascript">
    Ext.onReady(function () {
        var babel = new Babel(\'.json_encode($babel->config).\');
        babel.getMenu(babel.config.menu);
    });
</script>\');
        break;
	
	case \'OnDocFormSave\':
		$resource =& $modx->event->params[\'resource\'];
		if(!$resource) {
			$modx->log(modX::LOG_LEVEL_ERROR, \'No resource provided for OnDocFormSave event\');
			break;
		}
		if($modx->event->params[\'mode\'] == modSystemEvent::MODE_NEW) {
			/* no TV synchronization for new resources, just init Babel TV */
			$babel->initBabelTv($resource);
			break;
		}
		$babel->synchronizeTvs($resource->get(\'id\'));
		break;
		
	case \'OnEmptyTrash\':
		/* remove translation links to non-existing resources */
		$deletedResourceIds =& $modx->event->params[\'ids\'];
		if(is_array($deletedResourceIds)) {
			foreach ($deletedResourceIds as $deletedResourceId) {
				$babel->removeLanguageLinksToResource($deletedResourceId);
			}
		}		
		break;
		
	case \'OnContextRemove\':
		/* remove translation links to non-existing contexts */
		$context =& $modx->event->params[\'context\'];
		if($context) {
			$babel->removeLanguageLinksToContext($context->get(\'key\'));
		}
		break;
	
	case \'OnResourceDuplicate\':
		/* init Babel TV of duplicated resources */
		$resource =& $modx->event->params[\'newResource\'];
        $babel->initBabelTvsRecursive($modx,$babel,$resource->get(\'id\')); 
		break;
}
return;',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    6 => 
    array (
      'id' => '6',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'Tickets',
      'description' => '',
      'editor_type' => '0',
      'category' => '20',
      'cache_type' => '0',
      'plugincode' => 'switch($modx->event->name) {

	case \'OnManagerPageInit\':
		$modx->getVersionData();
		$modx23 = !empty($modx->version) && version_compare($modx->version[\'full_version\'], \'2.3.0\', \'>=\');
		$modx->regClientStartupHTMLBlock(\'<script type="text/javascript">
			MODx.modx23 = \'.(int)$modx23.\';
		</script>\');
		$cssFile = $modx->getOption(\'tickets.assets_url\',null,$modx->getOption(\'assets_url\').\'components/tickets/\').\'css/mgr/tickets.css\';
		$modx->regClientCSS($cssFile);
		break;


	case \'OnSiteRefresh\':
		if ($modx->cacheManager->refresh(array(\'default/tickets\' => array()))) {
			$modx->log(modX::LOG_LEVEL_INFO, $modx->lexicon(\'refresh_default\').\': Tickets\');
		}
		break;


	case \'OnDocFormSave\':
		/* @var Ticket $resource */
		if ($mode == \'new\' && $resource->class_key == "Ticket") {
			$modx->cacheManager->delete(\'tickets/latest.tickets\');
		}
		/* @var TicketsSection $resource */
		if ($mode == \'upd\' && $resource->class_key == \'TicketsSection\') {
			if (method_exists($resource, \'clearCache\')) {
				$resource->clearCache();
			}
		}
		break;


	case \'OnWebPagePrerender\':
		$output = & $modx->resource->_output;
		$output = str_replace(array(\'{{{{{\',\'}}}}}\'), array(\'[\',\']\'), $output);
		break;


	case \'OnPageNotFound\':
		// It is working only with friendly urls enabled
		$q = trim(@$_REQUEST[$modx->context->getOption(\'request_param_alias\',\'q\')]);
		$matches = explode(\'/\', rtrim($q, \'/\'));
		if (count($matches) < 2) {return;}

		$ticket_uri = array_pop($matches);
		$section_uri = implode(\'/\', $matches) . \'/\';

		if ($section_id = $modx->findResource($section_uri)) {
			/** @var TicketsSection $section */
			if ($section = $modx->getObject(\'TicketsSection\', $section_id)) {
				if (is_numeric($ticket_uri)) {
					$ticket_id = $ticket_uri;
				}
				elseif (preg_match(\'/^\\d+/\', $ticket_uri, $tmp)) {
					$ticket_id = $tmp[0];
				}
				else {
					$properties = $section->getProperties(\'tickets\');
					if (!empty($properties[\'uri\']) && strpos($properties[\'uri\'], \'%id\') !== false) {
						$pcre = str_replace(\'%id\', \'([0-9]+)\', $properties[\'uri\']);
						$pcre = preg_replace(\'/(\\%[a-z]+)/\', \'(?:.*?)\', $pcre);
						if (preg_match(\'/\'.$pcre.\'/\', $ticket_uri, $matches)) {
							$ticket_id = $matches[1];
						}
					}
				}
				if (!empty($ticket_id)) {
					if ($ticket = $modx->getObject(\'Ticket\', array(\'id\' => $ticket_id, \'deleted\' => 0))) {
						if ($ticket->published) {
							$modx->sendRedirect($modx->makeUrl($ticket_id), array(\'responseCode\' => \'HTTP/1.1 301 Moved Permanently\'));
						}
						elseif ($unp_id = $modx->getOption(\'tickets.unpublished_ticket_page\')) {
							$modx->sendForward($unp_id);
						}
					}
				}
			}
		}
		break;


	case \'OnWebPageComplete\':
		/** @var Tickets $Tickets */
		$Tickets = $modx->getService(\'tickets\');
		$Tickets->logView($modx->resource->id);
		break;


	case \'OnEmptyTrash\':
		if (!empty($ids)) {
			$collection = $modx->getIterator(\'TicketThread\', array(\'resource:IN\' => $ids));
			/** @var TicketThread $item */
			foreach ($collection as $item) {
				$item->remove();
			}

			$collection = $modx->getIterator(\'TicketVote\', array(\'id:IN\' => $ids, \'class\' => \'Ticket\'));
			/** @var TicketVote $item */
			foreach ($collection as $item) {
				$item->remove();
			}

			$collection = $modx->getIterator(\'TicketStar\', array(\'id:IN\' => $ids, \'class\' => \'Ticket\'));
			/** @var TicketStar $item */
			foreach ($collection as $item) {
				$item->remove();
			}
		}
		break;

}',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => 'core/components/tickets/elements/plugins/plugin.tickets.php',
    ),
    15 => 
    array (
      'id' => '15',
      'source' => '1',
      'property_preprocess' => '0',
      'name' => 'gateway',
      'description' => '',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '//Системные события : OnHandleRequest
$lngkey = $_REQUEST[\'cultureKey\'];
if ($modx->context->get(\'key\') != "mgr"){
  switch ($lngkey){
	  case \'en\':
	    setlocale(LC_ALL, "en_US.UTF-8");
	    $modx->switchContext(\'en\');
	    $modx->setOption(\'cultureKey\', \'en\');
	    break;

	  case \'ua\':
	    setlocale(LC_ALL, "uk_UA.UTF-8");
	    $modx->switchContext(\'ua\');
	    $modx->setOption(\'cultureKey\', \'ua\');
	    break;

         case \'ru\':
	    setlocale(LC_ALL, "ru_RU.UTF-8");
	    $modx->switchContext(\'web\');
	    $modx->setOption(\'cultureKey\', \'ru\');
	    break;

	  default:
	    setlocale(LC_ALL, "ru_RU.UTF-8");
	    $modx->switchContext(\'web\');
	    $modx->setOption(\'cultureKey\', \'ru\');
	    break;
  }
}',
      'locked' => '0',
      'properties' => 'a:0:{}',
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
    14 => 
    array (
      'id' => '14',
      'source' => '0',
      'property_preprocess' => '0',
      'name' => 'phpThumbOfCacheManager',
      'description' => 'Handles cache cleaning when clearing the Site Cache.',
      'editor_type' => '0',
      'category' => '0',
      'cache_type' => '0',
      'plugincode' => '/**
 * phpThumbOf
 *
 * Copyright 2009-2012 by Shaun McCormick <shaun@modx.com>
 *
 * phpThumbOf is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * phpThumbOf is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * phpThumbOf; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package phpthumbof
 */
/**
 * Handles cache management for phpthumbof filter
 *
 * @var \\modX $modx
 * @var array $scriptProperties
 *
 * @package phpthumbof
 */
if (empty($results)) $results = array();

switch ($modx->event->name) {
    case \'OnSiteRefresh\':
        if (!$modx->loadClass(\'modPhpThumb\',$modx->getOption(\'core_path\').\'model/phpthumb/\',true,true)) {
            $modx->log(modX::LOG_LEVEL_ERROR,\'[phpThumbOf] Could not load modPhpThumb class in plugin.\');
            return;
        }
        $assetsPath = $modx->getOption(\'phpthumbof.assets_path\',$scriptProperties,$modx->getOption(\'assets_path\').\'components/phpthumbof/\');
        $phpThumb = new modPhpThumb($modx);
        $cacheDir = $assetsPath.\'cache/\';

        /* clear local cache */
        if (!empty($cacheDir)) {
            /** @var DirectoryIterator $file */
            foreach (new DirectoryIterator($cacheDir) as $file) {
                if (!$file->isFile()) continue;
                @unlink($file->getPathname());
            }
        }

        /* if using amazon s3, clear our cache there */
        $useS3 = $modx->getOption(\'phpthumbof.use_s3\',$scriptProperties,false);
        if ($useS3) {
            $modelPath = $modx->getOption(\'phpthumbof.core_path\',null,$modx->getOption(\'core_path\').\'components/phpthumbof/\').\'model/\';
            /** @var modAws $modaws */
            $modaws = $modx->getService(\'modaws\',\'modAws\',$modelPath.\'aws/\',$scriptProperties);
            $s3path = $modx->getOption(\'phpthumbof.s3_path\',null,\'phpthumbof/\');
            
            $list = $modaws->getObjectList($s3path);
            if (!empty($list) && is_array($list)) {
                foreach ($list as $obj) {
                    if (empty($obj->Key)) continue;

                    $results[] = $modaws->deleteObject($obj->Key);
                }
            }
        }

        break;
}
return;',
      'locked' => '0',
      'properties' => NULL,
      'disabled' => '0',
      'moduleguid' => '',
      'static' => '0',
      'static_file' => '',
    ),
  ),
  'policies' => 
  array (
    'modAccessContext' => 
    array (
      'ua' => 
      array (
        0 => 
        array (
          'principal' => 0,
          'authority' => 9999,
          'policy' => 
          array (
            'load' => true,
          ),
        ),
        1 => 
        array (
          'principal' => 1,
          'authority' => 9999,
          'policy' => 
          array (
            'load' => true,
            'list' => true,
            'view' => true,
            'save' => true,
            'remove' => true,
            'copy' => true,
            'view_unpublished' => true,
          ),
        ),
      ),
    ),
  ),
);