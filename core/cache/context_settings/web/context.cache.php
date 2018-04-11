<?php  return array (
  'config' => 
  array (
    'base_url' => '/',
    'cultureKey' => 'ru',
    'locale' => 'ru_RU.UTF8',
    'site_start' => '1',
    'site_url' => 'http://localhost/',
  ),
  'resourceMap' => 
  array (
    0 => 
    array (
      0 => 1,
      1 => 2,
      2 => 3,
      3 => 4,
      4 => 5,
      5 => 6,
      6 => 9,
    ),
    3 => 
    array (
      0 => 14,
      1 => 25,
      2 => 26,
      3 => 27,
    ),
    5 => 
    array (
      0 => 15,
      1 => 16,
      2 => 28,
      3 => 29,
      4 => 30,
      5 => 31,
    ),
    6 => 
    array (
      0 => 7,
      1 => 8,
    ),
    9 => 
    array (
      0 => 10,
      1 => 11,
      2 => 12,
    ),
    10 => 
    array (
      0 => 13,
      1 => 17,
      2 => 18,
    ),
    11 => 
    array (
      0 => 19,
      1 => 20,
      2 => 21,
    ),
    12 => 
    array (
      0 => 22,
      1 => 23,
      2 => 24,
    ),
  ),
  'aliasMap' => 
  array (
    'index' => 1,
    'about' => 2,
    'examples' => 3,
    'contacts' => 4,
    'specialists' => 5,
    'services' => 6,
    'history' => 9,
    'examples/avtovoz' => 14,
    'examples/cyclone4' => 25,
    'examples/train-traktor' => 26,
    'examples/kran' => 27,
    'specialists/michael-chaban' => 15,
    'specialists/elena-podtykan' => 16,
    'specialists/aleksandr-parshikov' => 28,
    'specialists/denis-mikhaylitskiy' => 29,
    'specialists/muntyan-ekaterina' => 30,
    'specialists/yurii-trofimenko' => 31,
    'services/test' => 7,
    'services/technical-diagnosis' => 8,
    'history/foundation' => 10,
    'history/as-part-of-azovmash' => 11,
    'history/independent-test-center' => 12,
    'history/foundation/foundation1' => 13,
    'history/foundation/foundation2' => 17,
    'history/foundation/foundation3' => 18,
    'history/as-part-of-azovmash/as-part-of-azovmash1' => 19,
    'history/as-part-of-azovmash/as-part-of-azovmash2' => 20,
    'history/as-part-of-azovmash/as-part-of-azovmash3' => 21,
    'history/independent-test-center/1' => 22,
    'history/independent-test-center/2' => 23,
    'history/independent-test-center/3' => 24,
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
      'web' => 
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
          'authority' => 0,
          'policy' => 
          array (
            'about' => true,
            'access_permissions' => true,
            'actions' => true,
            'change_password' => true,
            'change_profile' => true,
            'charsets' => true,
            'class_map' => true,
            'components' => true,
            'content_types' => true,
            'countries' => true,
            'create' => true,
            'credits' => true,
            'customize_forms' => true,
            'dashboards' => true,
            'database' => true,
            'database_truncate' => true,
            'delete_category' => true,
            'delete_chunk' => true,
            'delete_context' => true,
            'delete_document' => true,
            'delete_eventlog' => true,
            'delete_plugin' => true,
            'delete_propertyset' => true,
            'delete_role' => true,
            'delete_snippet' => true,
            'delete_template' => true,
            'delete_tv' => true,
            'delete_user' => true,
            'directory_chmod' => true,
            'directory_create' => true,
            'directory_list' => true,
            'directory_remove' => true,
            'directory_update' => true,
            'edit_category' => true,
            'edit_chunk' => true,
            'edit_context' => true,
            'edit_document' => true,
            'edit_locked' => true,
            'edit_plugin' => true,
            'edit_propertyset' => true,
            'edit_role' => true,
            'edit_snippet' => true,
            'edit_template' => true,
            'edit_tv' => true,
            'edit_user' => true,
            'element_tree' => true,
            'empty_cache' => true,
            'error_log_erase' => true,
            'error_log_view' => true,
            'export_static' => true,
            'file_create' => true,
            'file_list' => true,
            'file_manager' => true,
            'file_remove' => true,
            'file_tree' => true,
            'file_update' => true,
            'file_upload' => true,
            'file_view' => true,
            'flush_sessions' => true,
            'frames' => true,
            'help' => true,
            'home' => true,
            'import_static' => true,
            'languages' => true,
            'lexicons' => true,
            'list' => true,
            'load' => true,
            'logout' => true,
            'logs' => true,
            'menus' => true,
            'menu_reports' => true,
            'menu_security' => true,
            'menu_site' => true,
            'menu_support' => true,
            'menu_system' => true,
            'menu_tools' => true,
            'menu_user' => true,
            'messages' => true,
            'namespaces' => true,
            'new_category' => true,
            'new_chunk' => true,
            'new_context' => true,
            'new_document' => true,
            'new_document_in_root' => true,
            'new_plugin' => true,
            'new_propertyset' => true,
            'new_role' => true,
            'new_snippet' => true,
            'new_static_resource' => true,
            'new_symlink' => true,
            'new_template' => true,
            'new_tv' => true,
            'new_user' => true,
            'new_weblink' => true,
            'packages' => true,
            'policy_delete' => true,
            'policy_edit' => true,
            'policy_new' => true,
            'policy_save' => true,
            'policy_template_delete' => true,
            'policy_template_edit' => true,
            'policy_template_new' => true,
            'policy_template_save' => true,
            'policy_template_view' => true,
            'policy_view' => true,
            'property_sets' => true,
            'providers' => true,
            'publish_document' => true,
            'purge_deleted' => true,
            'remove' => true,
            'remove_locks' => true,
            'resource_duplicate' => true,
            'resourcegroup_delete' => true,
            'resourcegroup_edit' => true,
            'resourcegroup_new' => true,
            'resourcegroup_resource_edit' => true,
            'resourcegroup_resource_list' => true,
            'resourcegroup_save' => true,
            'resourcegroup_view' => true,
            'resource_quick_create' => true,
            'resource_quick_update' => true,
            'resource_tree' => true,
            'save' => true,
            'save_category' => true,
            'save_chunk' => true,
            'save_context' => true,
            'save_document' => true,
            'save_plugin' => true,
            'save_propertyset' => true,
            'save_role' => true,
            'save_snippet' => true,
            'save_template' => true,
            'save_tv' => true,
            'save_user' => true,
            'search' => true,
            'settings' => true,
            'sources' => true,
            'source_delete' => true,
            'source_edit' => true,
            'source_save' => true,
            'source_view' => true,
            'steal_locks' => true,
            'tree_show_element_ids' => true,
            'tree_show_resource_ids' => true,
            'undelete_document' => true,
            'unlock_element_properties' => true,
            'unpublish_document' => true,
            'usergroup_delete' => true,
            'usergroup_edit' => true,
            'usergroup_new' => true,
            'usergroup_save' => true,
            'usergroup_user_edit' => true,
            'usergroup_user_list' => true,
            'usergroup_view' => true,
            'view' => true,
            'view_category' => true,
            'view_chunk' => true,
            'view_context' => true,
            'view_document' => true,
            'view_element' => true,
            'view_eventlog' => true,
            'view_offline' => true,
            'view_plugin' => true,
            'view_propertyset' => true,
            'view_role' => true,
            'view_snippet' => true,
            'view_sysinfo' => true,
            'view_template' => true,
            'view_tv' => true,
            'view_unpublished' => true,
            'view_user' => true,
            'workspaces' => true,
          ),
        ),
      ),
    ),
  ),
);