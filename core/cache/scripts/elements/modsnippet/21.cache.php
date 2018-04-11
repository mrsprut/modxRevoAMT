<?php  return '//$properties =& $scriptProperties;
//$properties[\'uri\'] = !empty($properties[\'uri\']) ? $properties[\'uri\'] : \'/\';
//$properties[\'type\'] = !empty($properties[\'type\']) ? (int)$properties[\'type\'] : 1;
//$properties[\'tpl_1\'] = !empty($properties[\'tpl_1\']) ? $properties[\'tpl_1\'] : \'historyOuterIndex\';
//$properties[\'tpl_2\'] = !empty($properties[\'tpl_2\']) ? $properties[\'tpl_2\'] : \'\';
//$properties[\'tpl_3\'] = !empty($properties[\'tpl_3\']) ? $properties[\'tpl_3\'] : \'\';

$output = \'\';
$cacheOptions = array(
    xPDO::OPT_CACHE_KEY => \'baseThemeCache\',
);

$cacheKey = \'selectFooterStyle/\'.md5(serialize($properties));

if($modx->getCacheManager() && is_null($output = $modx->cacheManager->get($cacheKey, $cacheOptions))) {
    
    if($_SERVER[\'REQUEST_URI\'] == \'/\' || $_SERVER[\'REQUEST_URI\'] == \'/ua/\') {
        $output = \'footer\';
    } /*elseif(substr_count($_SERVER[\'REQUEST_URI\'], \'about\') > 0) {
        $output = \'wrapper about\';
    }*/ else {
        $output = \'footer small\';
    }
}
return $output;
return;
';