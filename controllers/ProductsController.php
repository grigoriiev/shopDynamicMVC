<?php
//namespace Controller;


//require("BaseController.php");
//use Controller\BaseController;

//require("BaseController.php");
//
//use Controller\BaseController;
class ProductsController extends BaseController  {

public function index(){
 $blok=$this->qerybuilder->all("product");
require_once "./veiws/products.php";

}

}
//