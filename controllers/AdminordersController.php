<?php
//namespace Controller;
//require("BaseController.php");
//use Controller\BaseController;

class AdminordersController extends BaseController{

public function index(){
    if($_SESSION["user"]["login"]!="admin"){

        exit("<h1>НЕТ ДОСТУПА</h1>");
    }

    $orders = $this->qerybuilder->getGroupAll("basket","не куплено");
require_once "./veiws/admin-orders.php";
}
public function updateStatus(){


    if (isset($_POST["updateStatusOrders"])) {
       
        $data = ["id" => $_POST["id"], "statusBasket" => $_POST["status"]];
        $this->qerybuilder->update("basket", $data);
        header("Location:/veiws/adminorders");
    } else if (isset($_POST["updateStatusOrder"])) {
        $data = ["id" => $_POST["id"], "statusBasket" => $_POST["status"]];

        $redirect = $_POST["id"];
        $this->qerybuilder->update("basket", $data);

        header("Location:/veiws/adminorder/$redirect");
    } else {

        exit("<h1>ошибка</h1>");
    }




}
}
