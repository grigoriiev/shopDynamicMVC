<?php session_start();
    require_once "./autoload.php";



$qerybuilder = new QeryBuilder();
$auth = new Auth($qerybuilder);
$validator = new Validator($qerybuilder);
$imagemanager = new ImageManager($qerybuilder);
$cart = new Cart($qerybuilder);
$url_array = explode("/", $_SERVER['REQUEST_URI']);

if($url_array[1] && $url_array[2] ){
  
if(is_numeric($url_array[3])){
    $Сontroller= ucfirst($url_array[2]).'Controller';

    $controller=$Сontroller;
    $obj = new $controller($qerybuilder, $auth,$validator ,$imagemanager,$cart);
    $obj->index($url_array[3]);
    exit;
}else if(@is_null($url_array[3])){
$Сontroller= ucfirst($url_array[2]).'Controller';
$controller=$Сontroller;
$obj = new $controller($qerybuilder, $auth,$validator ,$imagemanager,$cart);

$obj->index();
exit;
}else if(is_string($url_array[3])){
  
    $Сontroller= ucfirst($url_array[2]).'Controller';
  
    $controller=$Сontroller;
    $obj = new $controller($qerybuilder, $auth,$validator ,$imagemanager,$cart);

    $obj->{$url_array[3]}();

  exit;
}
}
if ($_SERVER['REQUEST_URI'] == "/") {
   $obj = new MainController($qerybuilder, $auth,$validator ,$imagemanager,$cart);
    $obj->index();
    exit;
}


echo "404 | ERROR " . '<br>';
echo $_SERVER['REQUEST_URI'] . '<br>';
echo __DIR__ . "$_SERVER[DOCUMENT_ROOT]";
