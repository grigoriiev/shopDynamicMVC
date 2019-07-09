<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<body>
      <svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<symbol id="icon-pinterest-with-circle" viewBox="0 0 20 20">
<title>pinterest-with-circle</title>
<path d="M10 0.4c-5.302 0-9.6 4.298-9.6 9.6s4.298 9.6 9.6 9.6 9.6-4.298 9.6-9.6-4.298-9.6-9.6-9.6zM10.657 12.275c-0.616-0.047-0.874-0.352-1.356-0.644-0.265 1.391-0.589 2.725-1.549 3.422-0.297-2.104 0.434-3.682 0.774-5.359-0.579-0.975 0.069-2.936 1.291-2.454 1.503 0.596-1.302 3.625 0.581 4.004 1.966 0.394 2.769-3.412 1.55-4.648-1.762-1.787-5.127-0.041-4.713 2.517 0.1 0.625 0.747 0.815 0.258 1.678-1.127-0.25-1.464-1.139-1.42-2.324 0.069-1.94 1.743-3.299 3.421-3.486 2.123-0.236 4.115 0.779 4.391 2.777 0.309 2.254-0.959 4.693-3.228 4.517z"></path>
</symbol>
<symbol id="icon-google+-with-circle" viewBox="0 0 20 20">
<title>google+-with-circle</title>
<path d="M10 0.4c-5.302 0-9.6 4.298-9.6 9.6s4.298 9.6 9.6 9.6 9.6-4.298 9.6-9.6-4.298-9.6-9.6-9.6zM9.447 14.121c-0.603 0.293-1.252 0.324-1.503 0.324-0.048 0-0.075 0-0.075 0s-0.023 0-0.054 0c-0.392 0-2.343-0.090-2.343-1.867 0-1.746 2.125-1.883 2.776-1.883h0.017c-0.376-0.502-0.298-1.008-0.298-1.008-0.033 0.002-0.081 0.004-0.14 0.004-0.245 0-0.718-0.039-1.124-0.301-0.498-0.32-0.75-0.865-0.75-1.619 0-2.131 2.327-2.217 2.35-2.219h2.324v0.051c0 0.26-0.467 0.311-0.785 0.354-0.108 0.016-0.325 0.037-0.386 0.068 0.589 0.315 0.684 0.809 0.684 1.545 0 0.838-0.328 1.281-0.676 1.592-0.216 0.193-0.385 0.344-0.385 0.547 0 0.199 0.232 0.402 0.502 0.639 0.441 0.389 1.046 0.918 1.046 1.811 0 0.923-0.397 1.583-1.18 1.962zM14.5 10h-1.5v1.5h-1v-1.5h-1.5v-1h1.5v-1.5h1v1.5h1.5v1zM8.223 11.15c-0.052 0-0.104 0.002-0.157 0.006-0.444 0.033-0.854 0.199-1.15 0.469-0.294 0.266-0.444 0.602-0.423 0.941 0.045 0.711 0.808 1.127 1.735 1.061 0.912-0.066 1.52-0.592 1.476-1.303-0.042-0.668-0.623-1.174-1.481-1.174zM9.097 7.285c-0.242-0.85-0.632-1.102-1.238-1.102-0.065 0-0.131 0.010-0.194 0.027-0.263 0.075-0.472 0.294-0.588 0.62-0.119 0.33-0.126 0.674-0.024 1.066 0.185 0.701 0.683 1.209 1.185 1.209 0.066 0 0.132-0.008 0.194-0.027 0.549-0.154 0.893-0.992 0.665-1.793z"></path>
</symbol>
<symbol id="icon-twitter-with-circle" viewBox="0 0 20 20">
<title>twitter-with-circle</title>
<path d="M10 0.4c-5.302 0-9.6 4.298-9.6 9.6s4.298 9.6 9.6 9.6 9.6-4.298 9.6-9.6-4.298-9.6-9.6-9.6zM13.905 8.264c0.004 0.082 0.005 0.164 0.005 0.244 0 2.5-1.901 5.381-5.379 5.381-1.068 0-2.062-0.312-2.898-0.85 0.147 0.018 0.298 0.025 0.451 0.025 0.886 0 1.701-0.301 2.348-0.809-0.827-0.016-1.525-0.562-1.766-1.312 0.115 0.021 0.233 0.033 0.355 0.033 0.172 0 0.34-0.023 0.498-0.066-0.865-0.174-1.517-0.938-1.517-1.854v-0.023c0.255 0.141 0.547 0.227 0.857 0.237-0.508-0.34-0.841-0.918-0.841-1.575 0-0.346 0.093-0.672 0.256-0.951 0.933 1.144 2.325 1.896 3.897 1.977-0.033-0.139-0.049-0.283-0.049-0.432 0-1.043 0.846-1.891 1.891-1.891 0.543 0 1.035 0.23 1.38 0.598 0.431-0.086 0.835-0.242 1.2-0.459-0.141 0.441-0.44 0.812-0.831 1.047 0.383-0.047 0.747-0.148 1.086-0.299-0.253 0.379-0.574 0.713-0.943 0.979z"></path>
</symbol>
<symbol id="icon-facebook-with-circle" viewBox="0 0 20 20">
<title>facebook-with-circle</title>
<path d="M10 0.4c-5.302 0-9.6 4.298-9.6 9.6s4.298 9.6 9.6 9.6 9.6-4.298 9.6-9.6-4.298-9.6-9.6-9.6zM12.274 7.034h-1.443c-0.171 0-0.361 0.225-0.361 0.524v1.042h1.805l-0.273 1.486h-1.532v4.461h-1.703v-4.461h-1.545v-1.486h1.545v-0.874c0-1.254 0.87-2.273 2.064-2.273h1.443v1.581z"></path>
</symbol>
<symbol id="icon-loop2" viewBox="0 0 32 32">
<title>loop2</title>
<path d="M27.802 5.197c-2.925-3.194-7.13-5.197-11.803-5.197-8.837 0-16 7.163-16 16h3c0-7.18 5.82-13 13-13 3.844 0 7.298 1.669 9.678 4.322l-4.678 4.678h11v-11l-4.198 4.197z"></path>
<path d="M29 16c0 7.18-5.82 13-13 13-3.844 0-7.298-1.669-9.678-4.322l4.678-4.678h-11v11l4.197-4.197c2.925 3.194 7.13 5.197 11.803 5.197 8.837 0 16-7.163 16-16h-3z"></path>
</symbol>
<symbol id="icon-location"  viewBox="0 0 32 32">
<title>location</title>
<path d="M16 0c-5.523 0-10 4.477-10 10 0 10 10 22 10 22s10-12 10-22c0-5.523-4.477-10-10-10zM16 16c-3.314 0-6-2.686-6-6s2.686-6 6-6 6 2.686 6 6-2.686 6-6 6z"></path>
</symbol>
</defs>
</svg>
    <div class="continerWrapper">
        <div class="header-product-detail">
            <a href="/views/main">
              <img class="logo" src="/img/logo.png" alt="LOGO">  
          </a>
            <ul class="menu">
                <li><a href="/views/main">HOME</a></li>
                <li><a href="/views/products">PRODUCTS</a></li>
                <li><a href="#">HISTORY</a></li>
                <li><a href="#">SHOWROOM</a></li>
                <li><a href="/views/contactus">CONTACT</a></li>
                <li><a href="/views/basket">basket</a></li>
                <li><a href="#"><i class="fa fa-search fa-lg" aria-hidden="true"></i></a></li>
            </ul>

        </div>
        <div class="product-menu" style=" position:relative; width:1366px;">
            <ul class="product-menu-list">
                <li><a href="#">All</a></li>
                <li><a href="#">HOME</a></li>
                <li><a href="#">OFFICE</a></li>
                <li><a href="#">FURNITURE</a></li>
                <li><a href="#">MODERN</a></li>
                <li><a href="#">CLASSIC</a></li>

            </ul>

        </div>
<?php 


if( $blok){



?>


        
        <div class="product-dealis">
            <div class="product-dealis-img">
                <img src="<?php echo $blok['path']; ?>" alt="/slider1">
                <div class="small-img">
                <img  src="/img/controll.png" alt="controll">
                <img src="/img/controll11.png" alt="controll11">
                <img src="/img/controll2.png" alt="controll2">
                </div>
            </div>
            <div class="product-dealis-order">
                <span class="product-dealis-order-caption"><?php echo $blok['name']; ?></span>
                <span class="product-dealis-order-caption1">Hot Deal</span>
                <span class="product-dealis-order-price">$ <?php echo $blok['price']; ?><i>/sq</i></span>
                <form action="/template/productdetail/add_cart" method="post">
                <input type="number"class="form-control" id="quantity" value="1" min="1" max="10" name="numberProducts" style="width:100px; margin-left:40%; margin-bottom :5%">
                <input type="hidden" name="id" value="<?php echo $blok['id']; ?>">
               

                <button name="addCart" style="border:none; display:inline;" class="product-dealis-order-button" href="#">Order Us<i class="fa fa-angle-right  fa-lg" aria-hidden="true"></i></button>
                </form>
                <div  class="product-dealis-order-text1" ><?php echo substr($blok['description'],0,40 );?></div ><br>
                <div   class="product-dealis-order-text2"><?php echo substr($blok['description'],41,40 );?></div ><br>
                <div  class="product-dealis-order-text3"><?php echo substr($blok['description'],81,40 );?></div ><br>
                <div  style =""class="product-dealis-order-text3"><?php echo substr($blok['description'],121,40 );?></div ><br>
                <div  style =""class="product-dealis-order-text3"><?php echo substr($blok['description'],141,40 );?></div ><br>
                <div  style =""class="product-dealis-order-text3"><?php echo substr($blok['description'],161,40 );?></div ><br>
            </div>
        </div>
<?php 
}
?>

<form class="form" method="post" action="/views/productdetail/add_post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="emailHelp" placeholder="Name" name="name" required>
    <input type="hidden" type="text" value="<?php echo(int)$blok["id"];?>" id="exampleInputText1"  name="hiddenId" >
    <small id="emailHelp"  class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="text" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary" name="post">Submit</button>
</form>
<--
 <?php

foreach($tasks as $data){
?>
<div class="media">
  <div class="media-body">
    <h5 class="mt-0"><?php echo $data["name"]?></h5>
   <p> <?php echo $data["text"]?></p>
  </div>
</div>
<?php
//}
}
?>-->
        <div class="trending-products">
            <h1>Related Products</h1>

            <a class="explore" href="">explore all<i class="fa fa-angle-right  fa-lg" aria-hidden="true"></i></a>
            <div class="flex">
                <a href="#">
                    <div class="product1 pr-5"></div>
                </a>
                <a href="#">
                    <div class="product1 pr-6"></div>
                </a>
                <a href="#">
                    <div class="product1 pr-7"></div>
                </a>


            </div>
        </div>
        <div class="information">
            <div class="contact">
                <h3>Contact Us

                </h3>
                <p class="contact-one">132A Bridge Road Richmond VIC Australia.
                </p>
                <p class="contact-two">Talk to us on 1300 132 info@interior.com</p>
            </div>
            <div class="us-information">
                <h3>Useful Information</h3>
                <p class="us-information-one">Sales terms Customer care Delivery
                </p>
                <p class="us-information-two">Architect accounts Careers&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Exchanges & return</p>
            </div>
            <div class="touch">
                <h3>Let’s Stay in Touch!</h3>
                <p>Suscribe to know about our latest news, products and special offers just for suscribers.</p>
                <input type="email" placeholder="you email address"><i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i>
            </div>
        </div>
        <footer>
            <div class="left">© Copyright - INTERIOR 2016. All Rights Reserved.</div>
            <div class="img"><svg class="icon icon-facebook-with-circle"><use xlink:href="#icon-facebook-with-circle"></use></svg><svg class="icon icon-twitter-with-circle"><use xlink:href="#icon-twitter-with-circle"></use></svg><svg class="icon icon-google+-with-circle"><use xlink:href="#icon-google+-with-circle"></use></svg><svg class="icon icon-pinterest-with-circle"><use xlink:href="#icon-pinterest-with-circle"></use></svg></div>
            <div class="right">Terms & Conditions / Privacy policy & Cookies</div>
        <!--    <script src="/examples/vendors/jquery/jquery-3.2.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.1/dist/jquery.fancybox.min.js"></script>-->
<script defer src="../../svgxuse.js"></script>
        </footer>
    </div>
</body>

</html>
