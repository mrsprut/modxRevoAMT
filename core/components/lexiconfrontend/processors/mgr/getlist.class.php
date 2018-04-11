<?php
/**
 * @package lexiconFrontend
 */

class lexiconFrontendGetListProcessor extends modProcessor {

    public function initialize() {
        $this->setDefaultProperties(array(
            'start' => 0,
            'limit' => 10,
            'sort' => 'name',
            'dir' => 'ASC',
            'language' => 'en',
            'namespace' => 'lexiconfrontend',
            'topic' => 'default',
        ));
        if ($this->getProperty('language') == '') $this->setProperty('language','en');
        if ($this->getProperty('namespace') == '') $this->setProperty('namespace','lexiconfrontend');
        if ($this->getProperty('topic') == '') $this->setProperty('topic','default');
        return true;
    }

    public function process() {
        $where = array(
            'namespace' => $this->getProperty('namespace'),
            'topic' => $this->getProperty('topic'),
            'language' => $this->getProperty('language'),
            'start' => $this->getProperty('start'),
            'limit' => $this->getProperty('limit'),
            'sort' => $this->getProperty('sort'),
            'dir' => $this->getProperty('dir'),
            'language' => $this->getProperty('language'),
        );

        $search = $this->getProperty('search');
        if (!empty($search)) {
            $where['search'] = $search;
        }

        $response = $this->modx->runProcessor('workspace/lexicon/getlist', $where);
        return $response->response;
    }

}

return 'lexiconFrontendGetListProcessor';