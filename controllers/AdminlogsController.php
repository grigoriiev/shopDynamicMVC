<?php
//namespace Controller;
//require("BaseController.php");
//use Controller\BaseController;

class AdminlogsController extends BaseController


{
public function index(){
    if($_SESSION["user"]["login"]!="admin"){

        exit("<h1>НЕТ ДОСТУПА</h1>");
    }


    $logsList = $this->auth->getLogs();
    require_once "./veiws/admin-logs.php";
}

}