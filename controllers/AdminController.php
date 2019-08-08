<?php

class AdminController extends BaseController{


 

public function index(){

    if($_SESSION["user"]["login"]!="admin"){

        exit("<h1>НЕТ ДОСТУПА</h1>");
    }
    $allproduct =$this->qerybuilder->all("product");
    require_once "./views/admin.phtml";
 
}
public function updateDelete_product(){


    $data = ["price" => $_POST["price"], "description" => $_POST["textProduct"], "name" => $_POST["nameProduct"], "id" => $_POST["id"]];
    $image = $_FILES["imgFile"];
    $idImage = $_POST["id"];

    if ($this->validator->checkAdminProduct($data, $image) && isset($_POST["updateProduct"])) {
        $this->imagemanager->uploadUpdate("product", $image, $idImage);
        $this->qerybuilder->update("product", $data);
        header("Location:/view/admin");
    } else if (isset($_POST["deleteProduct"])) {

        $this->imagemanager->deleteImage("product", $_POST["id"]);
        $this->qerybuilder->delete("product", $_POST["id"]);
        header("Location:/view/admin");
    } else {

        exit("<h1>ошибка</h1>");
    }





}

public function add_product(){

    $imagePost = $_FILES["imgFile"];
        $path = "../files/" . $_FILES["imgFile"]["name"];
        $pathMin = "../minfiles/" . $_FILES["imgFile"]["name"];
        $data = ["price" => $_POST["price"], "description" => $_POST["textProduct"], "name" => $_POST["nameProduct"], "path" => $path, "minpath" => $pathMin];
        $dataCheck = ["price" => $_POST["price"], "description" => $_POST["textProduct"], "name" => $_POST["nameProduct"]];

        if ($this->validator->checkAdminProduct($dataCheck, $imagePost) && isset($_POST["createProduct"])) {
            $this->imagemanager->uploadStore("product", $imagePost);
            $this->qerybuilder->store("product", $data);
            header("Location:/view/admin");
        } else {
            exit("<h1>ошибка/h1>");
        }







}


    
}