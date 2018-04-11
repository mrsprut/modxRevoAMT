<?php  return 'if(substr_count($_SERVER[\'REQUEST_URI\'], \'/ua/\') == 0){
    if(substr_count($_SERVER[\'REQUEST_URI\'], \'foundation\') > 0) {
        $output = \'10\';
    } elseif(substr_count($_SERVER[\'REQUEST_URI\'], \'as-part-of-azovmash\') > 0) {
        $output = \'11\';
    } elseif(substr_count($_SERVER[\'REQUEST_URI\'], \'independent-test-center\') > 0) {
        $output = \'12\';
    }
}
else {
    if(substr_count($_SERVER[\'REQUEST_URI\'], \'foundation\') > 0) {
        $output = \'45\';
    } elseif(substr_count($_SERVER[\'REQUEST_URI\'], \'as-part-of-azovmash\') > 0) {
        $output = \'49\';
    } elseif(substr_count($_SERVER[\'REQUEST_URI\'], \'independent-test-center\') > 0) {
        $output = \'53\';
    }
}
return $output;
return;
';