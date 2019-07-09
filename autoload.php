<?php

spl_autoload_register("gbStandardAutoload");

function gbStandardAutoload($className)
{
    $dirs = [
        'controllers',
        'views',
        'models'
        
    ];
    $found = false;
    foreach ($dirs as $dir) {
     /*   if($dir=="controllers"){
        $fileName = './'. $dir .'/'. $className."Сontroller" .'.php';
        }else{
            $fileName = './'. $dir .'/'. $className .'.php';  
        }*/
        $fileName = './'. $dir .'/'. $className .'.php'; 
        if (is_file($fileName)) {
            require_once($fileName);
            $found = true;
        
    }
    }

    if (!$found) {
        throw new Exception('Unable to load ' . $className);
    }
    return true;
}
