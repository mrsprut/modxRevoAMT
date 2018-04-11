<?php
//Системные события : OnHandleRequest
$lngkey = $_REQUEST['cultureKey'];
if ($modx->context->get('key') != "mgr"){
  switch ($lngkey){
	  case 'en':
	    setlocale(LC_ALL, "en_US.UTF-8");
	    $modx->switchContext('en');
	    $modx->setOption('cultureKey', 'en');
	    break;

	  case 'ua':
	    setlocale(LC_ALL, "uk_UA.UTF-8");
	    $modx->switchContext('ua');
	    $modx->setOption('cultureKey', 'ua');
	    break;

         case 'ru':
	    setlocale(LC_ALL, "ru_RU.UTF-8");
	    $modx->switchContext('web');
	    $modx->setOption('cultureKey', 'ru');
	    break;

	  default:
	    setlocale(LC_ALL, "ru_RU.UTF-8");
	    $modx->switchContext('web');
	    $modx->setOption('cultureKey', 'ru');
	    break;
  }
}
return;
