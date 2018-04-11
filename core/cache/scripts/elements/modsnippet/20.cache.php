<?php  return 'if(($_SERVER[\'REQUEST_URI\'] == \'/\')
        || ($_SERVER[\'REQUEST_URI\'] == \'/http://localhost/\'
                || $_SERVER[\'REQUEST_URI\'] == \'/ua/\'
                || $_SERVER[\'REQUEST_URI\'] == \'http://localhost/ua/\')) {
        $output = \'[[$indexHeader]]\';
} elseif(substr_count($_SERVER[\'REQUEST_URI\'], \'examples\') > 0
        || substr_count($_SERVER[\'REQUEST_URI\'], \'specialists\') > 0
        || substr_count($_SERVER[\'REQUEST_URI\'], \'services\') > 0) {
    $output = \'[[$aboutHeader]]\';
} else {
    $output = \'[[$smallHeader]]\';
}
return $output;
return;
';