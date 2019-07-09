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
        textarea {
            resize: none;
        }

    </style>
</head>
<ul >
                <li><a href="/"">HOME</a></li>
                <li><a href="/views/products">PRODUCTS</a></li>
             
                <li><a href="/views/contactus">CONTACT</a></li>
                <li><a href="/views/basket">BASKET</a></li>

            </ul>
<body class="container-fluid">
    <h1>Привет, <?php echo $_SESSION["user"]["name"]." ".$_SESSION["user"]["surname"]?>
    </h1>
    <table class="table table-responsive users-table">
        <thead>
            <tr>
                <td>
                    Название
                </td>
                <td>
                    Картинка
                </td>
                <td>
                    Цена
                </td>
                <td>
                    Количество
                </td>

            </tr>
        </thead>

    </table>
    <?php


    $sumAll=0;
    foreach($products as $product )
    {
       
    ?>
    <form method="POST" action="/views/basket/delete_cart" enctype="multipart/form-data">
        <table class="table table-responsive users-table">

            <tbody>
                <tr>
                    <td style="width:500px">
                        <input type="hidden" name="hiddenID" type="text" value="<?php echo (int)$product["id_orders"];?>">
                        <span>
                            <?php echo  "  ".$product["name"];?></span>
                        <input type="hidden" name="hiddenNumberProducts" type="text" value="<?php echo "  ".(int)$product["items"];?>">
                    </td>
                    <td style="width:50px">
                        <img class="img-fluid " src="<?php echo $product["minpath"];?>" width="100" height="100" alt="">
                    </td>
                    <td style="width:300px">
                        <span style="margin-left:350px">
                            <?php echo  "  ".(int)$product["sumPriceItems"];?>
                        </span>
                    </td>
                    <td style="width:300px">
                        <!--
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="textProduct" data-validate="required" rows="3" >/textarea>
--> <input type="number" class="form-control" id="firstName" name="numberProducts" style="width:100px; float:right;" value="<?php echo (int)$product["items"];?>">




                    </td>

                    <td>
                        <button type="submit" name="deleteCart" class="btn btn-danger create-button">Удалить</button>

                    </td>

                </tr>
            </tbody>
        </table>

    </form>
    <ul>
  <?php
  (int)$sumAll +=(int)$product["sumPriceItems"];
   }
   if((int)$sumAll){
   ?>
   <li style="float:left">Сумма всех товаров<?php echo  "  ".$sumAll; ?> </li>
   <?php
   }
  ?>
   </ul> 
    
    <form method="POST" action="/views/basket/buy_cart" enctype="multipart/form-data">
        <button class="btn btn-primary btn-block save-button" type="submit" name="buy">Купить</button>


    </form>

</body>

</html>
