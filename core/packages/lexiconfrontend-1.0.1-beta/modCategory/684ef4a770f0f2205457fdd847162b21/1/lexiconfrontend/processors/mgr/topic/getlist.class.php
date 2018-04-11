<?php
/**
 * @package lexiconFrontend
 */

class lexiconFrontendTopicGetListProcessor extends modProcessor {

    public function initialize() {
        $this->setDefaultProperties(array(
            'limit' => 10,
            'start' => 0,
            'namespace' => 'lexiconfrontend',
            'language' => 'en',
        ));
        return parent::initialize();
    }

    public function process() {
        $where = array(
            'limit' => $this->getProperty('limit'),
            'start' => $this->getProperty('start'),
            'namespace' => $this->getProperty('namespace'),
            'language' => $this->getProperty('language')
        );
        $response = $this->modx->runProcessor('workspace/lexicon/topic/getlist', $where);
        return $response->response;
    }
}
return 'lexiconFrontendTopicGetListProcessor';