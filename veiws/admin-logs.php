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


foreach($logsList as $key =>$value){
    if($key!=0){
?>


<li>Ид <?php echo $value[0]?> имя: <?php echo $value[1]?>фамилия: <?php echo $value[2]?> логин: <?php echo $value[3]?>  email: <?php echo $value[4]?> время лога <?php echo $value[5]?></li>
<?php
    }
}
?>


</ul>


    <script>
    </script>
</body>

</html>