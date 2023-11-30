<?php
function my_autoload($className)
{
    $folder = array('system','Controllers','Models');

    foreach($folder as $folders) {
        $f = $folders.'/'.$className.'.php';

        if(file_exists($f)) {
            require_once($f);
        }
    }
}

spl_autoload_register('my_autoload');
