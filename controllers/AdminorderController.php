<?php
//namespace Controller;
//require("./BaseController.php");
//use Controller\BaseController;



class AdminorderController extends BaseController{

public function index($order){
    if($_SESSION["user"]["login"]!="admin"){

        exit("<h1>НЕТ ДОСТУПА</h1>");
    }


    $orders = $this->qerybuilder->getGroupOne("basket",$order);
    $ordersList = $this->qerybuilder->getOneOrder("basket",$order);
   // print_r($orders["id"]);
   // print_r( $ordersList);
  /// die;
require_once "./veiws/admin-order.php";
}
public function updateStatus(){
   // exit("<h1>Говно!!/h1>");
    if (isset($_POST["updateStatusOrders"])) {
      //  updateStatusOrder
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
