<?php
/**
 * The base class for lexiconFrontend.
 *
 * @package lexiconFrontend
 */

class lexiconFrontend {
    /* @var modX $modx */
    public $modx;
    /* @var lexiconFrontendControllerRequest $request */
    protected $request;
    public $initialized = array();
    public $chunks = array();


    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = array()) {
        $this->modx =& $modx;

        $corePath = $this->modx->getOption('lexiconfrontend_core_path', $config, $this->modx->getOption('core_path') . 'components/lexiconfrontend/');
        $assetsUrl = $this->modx->getOption('lexiconfrontend_assets_url', $config, $this->modx->getOption('assets_url') . 'components/lexiconfrontend/');
        $connectorUrl = $assetsUrl . 'connector.php';

        $this->config = array_merge(array(
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
            'imagesUrl' => $assetsUrl . 'images/',
            'connectorUrl' => $connectorUrl,

            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'templatesPath' => $corePath . 'elements/templates/',
            'processorsPath' => $corePath . 'processors/'
        ), $config);

        $this->modx->lexicon->load('lexiconfrontend:default');
    }
}