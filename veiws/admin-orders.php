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



foreach($orders  as $order){
?>

     <form  method="POST" action="/views/adminorders/updateStatus" enctype="multipart/form-data">
        <table class="table table-responsive users-table">
            <thead>
                <tr>
                  <th>Заказ номер </th>
                  <th>Пользователь</th>
                  <th>Количество предметов в заказе</th>
                  <th>Сформулирован</th>
                  <th>Статус</th>
                  <th>Изменить статус</th>
                </tr>
              </thead>
              <tbody>
            
           <tr>
                  <td><a href="/views/adminorder/<?php echo $order["id_orders"];?>"><?php echo $order["id_orders"];?></a>
                  <input type="hidden" type="text" name="id" value="<?php echo $order["id_orders"];?>" ></td>
                  <td><?php echo  "  ".$order["usersName"];?></td>
                  <td> <?php echo  "  ".$order["name"];?></td>
                  <td> <?php echo  "  ".$order["items"];?></td>
                  <td><?php echo  "  ".$order["dateOrder"];?></td>
                  <td>статус <?php echo  "  ".$order["statusBasket"];?></td>
                  <td>   <select   name="status">
                        <option selected  disabled>   </option>
                        <option value="новый">новый заказ</option>
                        <option value="принят">принят</option>
                        <option value="выполнен">выполнен</option>
                        <option value="отменен">отменен</option>
                        
                       </select>
                       <button type="submit" name="updateStatusOrders">изменить</button>
                    </td>
                  
                 
                      
               
           
        
    </tr>
</tbody>
        </table>
        
</form>
<?php
    }

?>

    <script>
    </script>
</body>

</html>