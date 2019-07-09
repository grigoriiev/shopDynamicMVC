<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style>
     
        textarea{
            resize: none;
        }
    </style>
</head>

<body class="container-fluid">
    <h1>Привет, мир! <?php echo $_SESSION["user"]["name"] ."  " .$_SESSION["user"]["surname"] ?></h1>
    <ul>
        <li><a href="/">Главная</a></li>
        <li><a href="/views/admin">Админ</a></li>
            <li><a href="/views/adminorders">Заказы</a></li>
            <li><a href="/views/adminusers">Пользователи</a></li>
            <li><a href="/views/adminlogs">Логи</a></li>
    </ul>
    <?php  



if($orders  ){
?>


     <form  method="POST" action="/views/adminorder/updateStatus" enctype="multipart/form-data">
        <table class="table table-responsive users-table">
            <thead>
                <tr>
                  <th>Заказ номер</th>
                  <th>Пользователь</th>
                  <th>Количество предметов в заказе </th>
                  <th>Сформулирован</th>
                  <th>Статус </th>
                  <th>Изменить</th>
                </tr>
              </thead>
              <tbody>
            
           <tr>
           <td> <?php echo $orders["id_orders"];?>
           <input type="hidden" type="text" name="id" value="<?php echo $orders["id_orders"];?>" >
           </td>
                  <td><?php echo $orders["usersName"];?></td>
                  <td><?php echo $orders["items"];?></td>
                  <td><?php echo $orders["dateOrder"];?></td>
                  <td><?php echo $orders["statusBasket"];?></td>
                  
                 
                  <td>   <select   name="status">
                        <option selected  disabled>   </option>
                        <option value="новый">новый заказ</option>
                        <option value="принят">принят</option>
                        <option value="выполнен">выполнен</option>
                        <option value="отменен">отменен</option>
                        
                       </select>
                       <button type="submit" name="updateStatusOrder">изменить</button>
                    </td>
                      
               
           
        
    </tr>
</tbody>
        </table>
        
</form>
<?php

}
?>
<ul>
<?php


    $sumAll=0;
foreach($ordersList as $value){
?>


<li><?php echo $value["name"]?> количество:<?php echo $value["items"]?> цена одного товара: <?php echo $value["price"]?> сумма: <?php echo $value["sumPriceItems"]?> </li>
<?php
(int)$sumAll +=(int)$value["sumPriceItems"];
}
?>
<li style="float:left">Сумма всех товаров<?php echo $sumAll; ?> </li>
<?php

?>

</ul>


    <script>
    </script>
</body>

</html>