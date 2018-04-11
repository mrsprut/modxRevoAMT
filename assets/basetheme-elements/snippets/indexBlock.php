<?php
$properties =& $scriptProperties;
$properties['num'] = !empty($properties['num']) ? (int)$properties['num'] : 1;
$properties['type'] = !empty($properties['type']) ? (int)$properties['type'] : 1;
$properties['tpl_1'] = !empty($properties['tpl_1']) ? $properties['tpl_1'] : 'historyOuterIndex';
$properties['tpl_2'] = !empty($properties['tpl_2']) ? $properties['tpl_2'] : '';
$properties['tpl_3'] = !empty($properties['tpl_3']) ? $properties['tpl_3'] : '';

$output = '';
$cacheOptions = array(
    xPDO::OPT_CACHE_KEY => 'baseThemeCache',
);

$cacheKey = 'indexBlock/'.md5(serialize($properties));

if($modx->getCacheManager() && is_null($output = $modx->cacheManager->get($cacheKey, $cacheOptions))) {
    $placeholders = array(
        'num' => $properties['num'],
    );

    $tpl = 'tpl_'.$properties['type'];

    $output = $modx->getChunk($properties[$tpl],$placeholders);
    $modx->cacheManager->set($cacheKey, $output, 0, $cacheOptions);
}
return $output;