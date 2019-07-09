<?php

class Cart
{
  public $db;
  public function __construct($db)
  {
    $this->db = $db;
  }
  public function addCart($id, $quntity)
  {
    $today = date("Y-m-d H:i:s");
    $status = "не куплено";
    $data3 = ["id_user" => (int)$_SESSION["user"]["id"], "statusBasket" => $status];
    if (!$order = $this->db->getNotOrder("basket", $data3)) {
      $data1 = ["id_user" => (int)$_SESSION["user"]["id"], "date" => $today, "statusBasket" => $status];
      $lastID = $this->db->storeAndId("basket", $data1);
      $data2 = ["id_orders" => $lastID, "id_product" => $id];
      for ($i = 0; $i < $quntity; $i++) {

        $this->db->store("buy_items", $data2);
      }
    } else {

      $data2 = ["id_orders" => $order[0]["id"], "id_product" => $id];

      for ($i = 0; $i < $quntity; $i++) {
        $this->db->store("buy_items", $data2);
      }
    }
  }
  public function getMaxOrder($table)
  {
    $lastUser = $this->db->getOneLast($table);
    if ($lastUser) {
      if ($lastUser["orderNumber"]) {
        $newOrderNumber = $lastUser["orderNumber"] + 1;
      } else {
        $newOrderNumber = 1;
      }
    }
    return $newOrderNumber;
  }


  public function buyCart($sessionID)
  {
    $today = date("Y-m-d H:i:s");
   
    $data1 = [
      "id_user" => $sessionID, "statusBasket" => "новый заказ", "date"=>$today 
    ];
    $this->db->updateStatusOrder1("basket", $data1);
  }





  public function showCart($session)
  {
    $basket = $this->db->getUserSession("basket", $session);
    return $basket;
  }
  public function deleteProduct($id)
  {
    $this->db->delete("basket", $id);
  }
}
