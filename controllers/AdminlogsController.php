<?php
/
class AdminlogsController extends BaseController


{
public function index(){
    if($_SESSION["user"]["login"]!="admin"){

        exit("<h1>НЕТ ДОСТУПА</h1>");
    }


    $logsList = $this->auth->getLogs();
    require_once "./views/admin-logs.php";
}

}