<?php

class  MainController extends BaseController{
public function index(){


require_once "./veiws/main.php";
}
public function registration(){
    if ($this->validator->checkRegistration("users", $_POST["login"], $_POST["email"], $_POST["tel"], $_POST["password"], $_POST["reapetPassword"])) {
        $password = $_POST["password"];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $login =$_POST["login"];
        $name =$_POST["name"];
        $surname= $_POST["surname"];
        $admin = ($login == "admin" && $name == "Андрей" && $surname == "Григорьев") ? 1 : 0;
        $today = date("Y-m-d H:i:s");
        $registration = ["name" => $_POST["name"], "surname" => $_POST["surname"], "login" => $_POST["login"], "email" => $_POST["email"], "tel" => $_POST["tel"], "password" => $password_hash, "date" => $today, "admin" => $admin, "statusUser" => "normal"];
        $this->auth->register("users", $registration, $_POST["login"], $_POST["password"], $password_hash);
        if ($_SESSION["user"]["admin"] == 1) {
            header("Location: /veiws/admin");
        } else if ($_SESSION["user"]["admin"] == 0) {
            header("Location:/veiws/products");
        }
    } else {
        header("Location: /");
    }





}
public function login(){

session_start();
    if ($this->auth->login($_POST["login"], $_POST["password"])) {
        $this->validator->checkLogin();
    } else {
        $this->validator->checkLogin();
    }

}
public function  logout(){

$this->auth->logout();
header("Location: /");
}




}

