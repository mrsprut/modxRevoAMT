<?php
/**
 * lexiconFrontend Connector
 *
 * @package lexiconFrontend@package lexiconFrontend
 */

// Load MODX config
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
}
else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}

require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption('lexiconfrontend_core_path', null, $modx->getOption('core_path') . 'components/lexiconfrontend/');
require_once $corePath . 'model/lexiconfrontend/lexiconfrontend.class.php';
$modx->sendex = new lexiconFrontend($modx);

$modx->lexicon->load('lexiconfrontend:mgr');

/* handle request */
$path = $modx->getOption('processorsPath', $modx->lexiconfrontend->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));