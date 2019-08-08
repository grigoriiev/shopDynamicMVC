<?php

class ProductsController extends BaseController  {

public function index(){
 $blok=$this->qerybuilder->all("product");
require_once "./views/products.php";

}

}
