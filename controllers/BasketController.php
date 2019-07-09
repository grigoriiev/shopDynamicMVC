<?php
//namespace Controller;
//require("./BaseController.php");
//use Controller\BaseController;

class BasketController extends BaseController{

public function index (){
session_start();
 $products =$this->qerybuilder->getUserProductBuyCart("basket",  $_SESSION["user"],"не куплено");
require_once "./veiws/basket.php";
}
   public function  buy_cart(){
    session_start();
    if (isset($_POST["buy"]) && $_SESSION["user"]["id"]) {
        $this->cart->buyCart($_SESSION["user"]["id"]);
        header("Location:/veiws/basket");
    } else {
        exit("ошибка");
    }


   }
   public function delete_cart(){

    if (isset($_POST["deleteCart"])) {
        $this->qerybuilder->delete("basket", $_POST["hiddenID"]);
        header("Location:/veiws/basket");
    } else {
        exit("ошибка");
    }


   }
}
