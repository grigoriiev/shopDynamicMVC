<?php session_start(); 
?>
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


foreach($users as $user){
?>


     <form  method="POST" action="/views/adminusers/updateAdminBan" enctype="multipart/form-data">
        <table class="table table-responsive users-table">
            <thead>
                <tr>
                  <th>Ид пользователя </th>
                  <th>Имя</th>
                  <th>Фамилия </th>
                  <th>Дата регистрации</th>
                  <th>Статус бан</th>
                  <th>Изменить бан</th>
                  <th>Статус админ</th>
                  <th>Изменить админ</th>
                </tr>
              </thead>
              <tbody>
            
           <tr>
           <td><?php echo "  ".$user["id"];?>
           
           </td>
                  <td><?php echo "  ". $user["name"];?></td>
                  <td><?php echo  "  ".$user["surname"];?></td>
                  <td><?php echo "  ". $user["date"];?></td>
                  <td> <?php echo  "  ".$userStat=($user["statusUser"]=="normal")?"не забанин":"забанин";?></td>
                
                 
                  <td>   <select   name="statusBan">
                        <option selected  disabled>   </option>
                        <option value="banned">забанин</option>
                        <option value="normal">не забанин</option>
                        
                       </select>
                       <input type="hidden"  name="hidden" value="<?php echo  "  ".$user["id"];?>" >
                       <button type="submit" name="updateBan">забанить</button>
                      
                    </td>
                    <td>статус <?php echo  "  ".$admin =$user["admin"]?"да":"нет";?></td>
                    <td>   <select   name="statusUser">
                        <option selected  disabled>   </option>
                        <option value="0">не админ</option>
                        <option value="1">админ</option>
                        
                       </select>
                       
                       <button type="submit" name="updateAdmin">админ</button>
                    </td>
                      
               
           
        
    </tr>
</tbody>
        </table>
        
</form>
<?php
}

?>

</body>

</html>