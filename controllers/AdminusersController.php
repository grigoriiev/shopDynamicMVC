<?php
//namespace Controller;
//require("BaseController.php");
//use Controller\BaseController;

class AdminusersController extends BaseController{
public function index(){
    if($_SESSION["user"]["login"]!="admin"){

        exit("<h1>НЕТ ДОСТУПА</h1>");
    }



    $users = $this->qerybuilder->all("users");
    require_once "./veiws/admin-users.php";
}


public function updateAdminBan(){
    if (isset($_POST["updateBan"]) && !empty($_POST["statusBan"])) {
        //  exit("xthn");
        $data = ["id" => $_POST["hidden"], "statusUser" => $_POST["statusBan"]];

        $this->qerybuilder->update("users", $data);
        header("Location:/veiws/adminusers");
    }
    if (isset($_POST["updateAdmin"]) && $_POST["statusUser"]==0 ||POST["statusUser"]==1) {

        $data = ["id" => $_POST["hidden"], "admin" => $_POST["statusUser"]];
        $$this->qerybuilder->update("users", $data);
        header("Location:/veiws/adminusers");
    }
    exit("<h1>ошибка</h1>");
}






}