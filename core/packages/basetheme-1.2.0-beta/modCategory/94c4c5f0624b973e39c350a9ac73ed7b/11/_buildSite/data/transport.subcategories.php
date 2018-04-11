<?php

$subcategories = array();

$tmp = array(
    /*
     * Base
     */
    'base' => array(
        'chunks'
    ),
    /*
     * Common
     */
    'common' => array(
        'chunks'
    ),
    /*
     * Content
     */
    'content' => array(
        'chunks'
    ),

    /*
     * Parts
     */
    //Contacts
//    'partsContacts' => array(
//        'chunks'
//    ),
    /*
     * Technical
     */
    //Index
//    'technical' => array(
//        'templates'
//    ),
);

$val = array(
    'chunks' => array(
        'object' => 'Chunks',
        'update' => BUILD_CHUNK_UPDATE,
        'transport' => 'chunks',
        'dir' => 'chunks'
    ),
    'templates' => array(
        'object' => 'Templates',
        'update' => BUILD_TEMPLATE_UPDATE,
        'transport' => 'templates',
        'dir' => 'templates'
    ),
);

foreach ($tmp as $name=>$elements) {

    /* create category */
    /* @var modCategory $category */
    $subcategory = $modx->newObject('modCategory');
    $subcategory->set('category',$name);

    $subcategories[] = $subcategory;

    foreach($elements as $element) {
        $value = $val[$element];
        if (defined('BUILD_CHUNK_UPDATE')) {
            $attr[xPDOTransport::RELATED_OBJECT_ATTRIBUTES]['Children'][xPDOTransport::RELATED_OBJECT_ATTRIBUTES][$value['object']] = array (
                xPDOTransport::PRESERVE_KEYS => false,
                xPDOTransport::UPDATE_OBJECT => $value['update'],
                xPDOTransport::UNIQUE_KEY => 'name',
            );
            $el = include $sources['data'].'subcategories/'.$name.'/'.$value['dir'].'/transport.'.$value['transport'].'.php';
            if (!is_array($el)) {
                $modx->log(modX::LOG_LEVEL_ERROR,'Could not package in '.$value['object'].' to category '.$name.'.');
            } else {
                $subcategory->addMany($el);
                $modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.count($el).' '.$value['object'].' to category '.$name.'.');
            }
        }
    }

}

unset($tmp);
return $subcategories;