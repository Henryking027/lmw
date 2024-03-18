<?php

include('../includes/connect.php');
session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Millenium Wears-Checkout Page </title>
    <!-- bootstrapC CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    <style>
    .logo{
    width: 7%;
    height: 7%;
}
</style>
</head>
<body>


<!-- navbar -->

    <!-- first child -->
<div class="bg-light">
    <h3 class="text-center"> Luxury Millenium Wears </h3>
    <p class="text-center"> All your Luxury Wears in one stop</p>
</div>


 
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-light bg-secondaary"> 
    <ul class= "navbar-nav me-auto">
    
        <?php
        if(!isset($_SESSION['username'])){

            echo "<li class='nav-item'>
            <a class='nav-link' href='../index.php'>Welcome guest</a>
          </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='../index.php'>Welcome ".$_SESSION['username']."</a>
          </li>";
          }
                    

        if(!isset($_SESSION['username'])){

          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_login.php'>Login</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='logout.php'>Logout</a>
        </li>";
        }


        ?>
        
    </ul>
</nav>




<!-- third Child -->



<!-- fourth child -->
<div class="row px-1">
    <div class="col-md-12"> 
    <!-- products -->

        <div class="row">
            <?php
            if(!isset($_SESSION['username'])){
include('user_login.php');

            }else{
                include('payment.php');
            }
            ?>
        </div>
    </div>   
</div>




<!-- last child -->

</div>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>