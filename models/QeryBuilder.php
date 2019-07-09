<?php


class QeryBuilder
{
    public $pdo;
    function __construct()
    {

        $this->pdo = new PDO("mysql:host=127.0.0.1; dbname=shop_db", "root", "12345");
    }
    function getAllTasks()
    {
        $sql = "SELECT *FROM tasks";
        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute();
        $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $tasks;
    }




    function  all($table)
    {
        $sql = "SELECT * FROM $table";
        $statement = $this->pdo->prepare($sql); //подготовить
        $statement->execute(); //true || false
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
    function getOne($table, $id)
    {

        $sql = "SELECT * FROM  $table WHERE id =:id";
        $startement = $this->pdo->prepare($sql);
        $startement->bindParam(":id", $id);
        $startement->execute();
        $result = $startement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function getPath($table, $path)
    {

        $sql = "SELECT * FROM  $table WHERE path =:path";
        $startement = $this->pdo->prepare($sql);
        $startement->bindParam(":path", $path);
        $startement->execute();
        $result = $startement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function getOneIdProduct($table, $id)
    {

        $sql = "SELECT * FROM  $table WHERE id_product =:id_product";
        $startement = $this->pdo->prepare($sql);
        $startement->bindParam(":id_product", $id);
        $startement->execute();
        $result = $startement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function getOneLast($table)
    {
        ///только при покупке ид  товара ,  берется  номер последнего заказа где есть статус куплен
        $sql = "SELECT max(orderNumber) FROM  $table ";
        $sql11 = "SELECT  *,count(items.id_product )*product.price as sumPriceItems FROM $table INNER JOIN items ON $table.id = items.id_orders  INNER JOIN users ON $table.id_user = users.id INNER JOIN product ON items.id_product = product.id  WHERE id_user =:id_user  and statusCart =:statusCart group by id_product";

   
        $startement = $this->pdo->prepare($sql);
    
        $startement->execute();
        $result = $startement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function getUserProductBuyCart($table, $session, $status)
    {
       
        $table = "basket";
       
        $sql1 = "SELECT  *,count(buy_items.id_product )*product.price as sumPriceItems , count(buy_items.id_product) as items , basket.date as dateOrder FROM $table INNER JOIN buy_items ON basket.id = buy_items.id_orders  INNER JOIN users ON basket.id_user = users.id INNER JOIN product ON buy_items.id_product = product.id  WHERE id_user = :id_user  and statusBasket = :statusBasket    GROUP BY buy_items.id_product";

        $startement = $this->pdo->prepare($sql1);
        $startement->bindParam(":id_user", $session["id"]);
        $startement->bindParam(":statusBasket", $status);
        $startement->execute();
        $result = $startement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function getNotOrder($table, $data)
    {
        $sql = "SELECT * FROM $table WHERE id_user =:id_user and statusBasket = :statusBasket";
        $startement = $this->pdo->prepare($sql);
        $startement->bindParam(":id_user", $data["id_user"]);
        $startement->bindParam(":statusBasket", $data["statusBasket"]);
        $startement->execute();
        $result = $startement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }





    function getUserSessionStatus($table, $session, $status)
    {

        $sql = "SELECT * FROM  $table WHERE id_user =:id_user and statusCart =:statusCart";

        $startement = $this->pdo->prepare($sql);
        $startement->bindParam(":id_user", $session["id"]);
        $startement->bindParam(":statusCart", $status);
        $startement->execute();
        $result = $startement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function storeAndId($table, $data)
    {

        $keys = array_keys($data);
        $stringOfKeys = implode(',', $keys);
        $placeholder = ":" . implode(', :', $keys);
     
        $sql = "INSERT INTO $table ($stringOfKeys)VALUES ($placeholder)";
        $startement = $this->pdo->prepare($sql);
        $startement->execute($data);
        $id = $this->pdo->lastInsertId();
        return  $id;
    }





    function getGroupAll($table, $status)
    {
    
     
        $sql1 = "SELECT  *,count(buy_items.id_product )*product.price as sumPriceItems , count(buy_items.id_product) as items, users.name as usersName,  basket.date as dateOrder  FROM $table INNER JOIN buy_items ON basket.id = buy_items.id_orders  INNER JOIN users ON basket.id_user = users.id INNER JOIN product ON buy_items.id_product = product.id  WHERE not statusBasket =:statusBasket    GROUP BY buy_items.id_orders";

        $statement = $this->pdo->prepare($sql1);
        $statement->bindParam(":statusBasket", $status);
        $statement->execute();
        $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $tasks;
    }
    
    function getGroupOne($table, $orderNumber)
    {
     
    
        $sql1 = "SELECT  *,count(buy_items.id_product )*product.price as sumPriceItems , count(buy_items.id_product) as items , users.name as usersName , basket.date as dateOrder FROM $table INNER JOIN buy_items ON basket.id = buy_items.id_orders  INNER JOIN users ON basket.id_user = users.id INNER JOIN product ON buy_items.id_product = product.id  WHERE   id_orders =:id_orders  GROUP BY buy_items.id_orders";
      
        $statement = $this->pdo->prepare($sql1);
        $statement->bindParam(":id_orders", $orderNumber);
        $statement->execute();
        $tasks = $statement->fetch(PDO::FETCH_ASSOC);
        return $tasks;
    }
    function getOneOrder($table, $orderNumber)
    {
        
      
        $sql1 = "SELECT  *,count(buy_items.id_product )*product.price as sumPriceItems , count(buy_items.id_product) as items, basket.date as dateOrder FROM $table INNER JOIN buy_items ON basket.id = buy_items.id_orders  INNER JOIN users ON basket.id_user = users.id INNER JOIN product ON buy_items.id_product = product.id  WHERE   id_orders =:id_orders GROUP BY buy_items.id_product";
        $statement = $this->pdo->prepare($sql1);
        $statement->bindParam(":id_orders", $orderNumber);
        $statement->execute();
        $tasks = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $tasks;
    }


    function getUserEmailPassword($table, $email, $password)
    {

        $sql = "SELECT * FROM $table WHERE email=:email AND password=:password LIMIT 1";
        $startement = $this->pdo->prepare($sql);
        $startement->bindParam(":email", $email);
        $startement->bindParam(":password", $password);
        $startement->execute();
        $result = $startement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function getUserLogin($table, $login)
    {

        $sql = "SELECT * FROM $table WHERE login=:login";
        $startement = $this->pdo->prepare($sql);
        $startement->bindParam(":login", $login);
        $startement->execute();
        $result = $startement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function store($table, $data)
    {
      
        $keys = array_keys($data);
        $stringOfKeys = implode(',', $keys);
        $placeholder = ":" . implode(', :', $keys);
        //    print_r($placeholder );
        //exit;
        $sql = "INSERT INTO $table ($stringOfKeys)VALUES ($placeholder)";
        $startement = $this->pdo->prepare($sql);
        $startement->execute($data);
    }
    function update($table, $data)
    {
      
        $fields = '';

        foreach ($data as $key => $value) {

            $fields .= $key . "=:" . $key . ",";
        }

        $fields = rtrim($fields, ',');
        $sql = "UPDATE $table SET $fields WHERE id=:id";
        //print_r( $fields );
        //  exit;
        $startement = $this->pdo->prepare($sql);
        $startement->execute($data);
    }
   
    function updateStatusOrder1($table, $data)
    {
    
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= $key . "=:" . $key . ",";
        }
        $fields = rtrim($fields, ',');
  
        $oldStatusOrder = "не куплено";

        $sql = "UPDATE  $table SET $fields WHERE id_user=:id_user and`statusBasket`='$oldStatusOrder'";
 
        $startement = $this->pdo->prepare($sql);
        $startement->bindParam(":id_user", $data["id_user"]);
 
        $startement->execute($data);
    }




    function updateStatus($table, $data)
    {

        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= $key . "=:" . $key . ",";
        }
        $fields = rtrim($fields, ',');
        $sql = "UPDATE $table SET $fields WHERE statusCart =:statusCart";
        $startement = $this->pdo->prepare($sql);
        $startement->execute($data);
    }
    function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id=:id";
        $startement = $this->pdo->prepare($sql);
        $startement->bindParam(":id", $id);
        $startement->execute();
    }

    
}
