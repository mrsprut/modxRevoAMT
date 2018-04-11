<?php
/**
 * The home manager controller for lexiconFrontend.
 *
 * @package lexiconFrontend
 */
class lexiconFrontendHomeManagerController extends lexiconFrontendMainController {
	/* @var lexiconFrontend $lexiconFrontend */
	public $lexiconFrontend;

	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
	}

	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('lexiconfrontend');
	}

	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
        $this->addJavascript($this->lexiconFrontend->config['jsUrl'] . 'mgr/misc/combos.js');
        $this->addJavascript($this->lexiconFrontend->config['jsUrl'] . 'mgr/widgets/lexiconfrontend.grid.js');
        $this->addJavascript($this->lexiconFrontend->config['jsUrl'] . 'mgr/widgets/lexiconfrontend.panel.js');
        $this->addJavascript($this->lexiconFrontend->config['jsUrl'] . 'mgr/sections/home.js');
        $this->addHtml("<script>
        Ext.onReady(function() {
           MODx.load({ xtype: 'lexiconfrontend-page-home' });
        });</script>");
	}


	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->lexiconFrontend->config['templatesPath'] . 'home.tpl';
	}
}