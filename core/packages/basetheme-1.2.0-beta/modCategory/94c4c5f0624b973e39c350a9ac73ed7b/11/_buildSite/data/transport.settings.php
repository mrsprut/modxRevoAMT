<?php

$settings = array();

$tmp = array(
    // resources
//    'id_ajax_form_contacts' => array(
//        'xtype' => 'numberfield',
//        'value' => '',
//        'area' => 'basetheme_resources',
//    ),
//    'id_ajax_form_subscribe' => array(
//        'xtype' => 'numberfield',
//        'value' => '',
//        'area' => 'basetheme_resources',
//    ),
);

foreach ($tmp as $k => $v) {
    /* @var modSystemSetting $setting */
    $setting = $modx->newObject('modSystemSetting');
    $setting->fromArray(array_merge(
        array(
            'key' => 'basetheme.'.$k,
            'namespace' => PKG_NAME_LOWER,
        ), $v
    ),'',true,true);

    $settings[] = $setting;
}

unset($tmp);
return $settings;
