<?php
/**
 * @package lexiconFrontend
 */

class lexiconFrontendEntryUpdateFromGridProcessor extends modProcessor {
    /** @var modLexiconEntry $entry */
    public $entry;

    public function process() {
        $property = array(
            'data' => $this->getProperty('data')
        );
        $response = $this->modx->runProcessor('workspace/lexicon/updatefromgrid', $property);
        return $response->response;
    }

}

return 'lexiconFrontendEntryUpdateFromGridProcessor';