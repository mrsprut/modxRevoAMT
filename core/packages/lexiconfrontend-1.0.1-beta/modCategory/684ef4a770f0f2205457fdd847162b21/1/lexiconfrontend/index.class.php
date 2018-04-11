<?php

/**
 * Class lexiconFrontendMainController
 *
 * @package lexiconFrontend
 */
abstract class lexiconFrontendMainController extends modExtraManagerController {
	/** @var lexiconFrontend $lexiconFrontend */
	public $lexiconFrontend;


	/**
	 * @return void
	 */
	public function initialize() {
        $corePath = $this->modx->getOption('lexiconfrontend_core_path', null, $this->modx->getOption('core_path') . 'components/lexiconfrontend/');
		require_once $corePath . 'model/lexiconfrontend/lexiconfrontend.class.php';

		$this->lexiconFrontend = new lexiconFrontend($this->modx);

        $this->addJavascript($this->lexiconFrontend->config['jsUrl'] . 'mgr/lexiconfrontend.js');
        $this->addHtml('<script>
		Ext.onReady(function() {
			lexiconFrontend.config = ' . $this->modx->toJSON($this->lexiconFrontend->config) . ';
			lexiconFrontend.config.connector_url = "' . $this->lexiconFrontend->config['connectorUrl'] . '";
		});
		</script>');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('lexiconfrontend:mgr');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends lexiconFrontendMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}