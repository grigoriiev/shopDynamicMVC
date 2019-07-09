<?php
//namespace Controller;
//require("./BaseController.php");
//use Controller\BaseController;

class ProductdetailController extends BaseController{

public function index ($get){
$blok=$this->qerybuilder->getOne("product",$get);
$tasks=$this->qerybuilder->getOneIdProduct("post",$get);
//echo $_GET["id"];
//exit;
require_once "./veiws/product-detail.php";
}
public function add_post(){
    $redirect = $_POST["hiddenId"];
    if (isset($_POST["post"])) {
        $post = ["name" => $_POST["name"], "text" => $_POST["text"], "id_product" => $redirect];
        $this->qerybuilder->store("post", $post);
        header("Location:/veiws/productdetail/$redirect");
    } else {
        exit("<h1>Ошибка</h1>");
    }


}
public function add_cart(){
    $id = $_POST["id"];
    $quantity = $_POST["numberProducts"];
    if (isset($_POST["addCart"]) && isset($_SESSION["user"])) {
        $this->cart->addCart($id, $quantity);
        header("Location:/veiws/productdetail/$id");
    } else {
        exit("<h1>Залогинтесь</h1>");
    }

    
}
}


