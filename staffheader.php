<?php
// Check if the id session variable is not set, then start the session
if (!isset($_SESSION['id'])) {
    session_start(); // Start the session
}

$host = 'localhost';
$dbname = 'rahman';
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

// Include functions file
require('functions.php');

// Check for login and set session variables if logged in
if (isset($_SESSION['id'])) {
    // User is logged in
    $id = $_SESSION['id'];
}
?>



<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta name="description" content="Rahman Plaza Template">
    <meta name="keywords" content="Rahman Plaza, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rahman Plaza | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
   


</head>

  
<body>

   
<!-- start #header -->
<header class="header" id="header">
        <div class="container-fluid">
            <div class="row">
            <div class="header__logo">
    <a href="./index.html">
        <img src="img/logo.png" alt="">
        
    </a>
</div>

<div class="categories__text">
    <h1 style="margin-top:25px; width:250px; font-size:50px">RahmanPlaza</h1>
</div>
                <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
    <ul>
        <li class="active"><a href="./index.php">Home</a></li>
        <li><a href="./shop.php">Shop</a></li>
        <li><a href="./userdetails.php">User details</a></li>
        <li><a href="./discount_content.php">Discount details</a></li>
        <?php
        if (isset($_SESSION['id']) && isset($_SESSION['role'])) {
            // User is logged in
            echo '<li><a href="./my_account.php">My Account</a></li>';
           
        } else {
            // User is not logged in
            echo '<li><a href="./login.php">Login</a></li>';
            echo '<li><a href="./user_registration.php">Register</a></li>';
        }
        ?>
    </ul>
</nav>
                    
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                       
                    <ul class="header__right__widget">
    <li><span class="icon_search search-switch"></span></li>
    <li><a href="#"><span class="icon_heart_alt"></span>
        <div class="tip">2</div>
    </a></li>
    <?php
    if (isset($_SESSION['id'])) {
        // Show the cart only if the user is logged in
        echo '<li><a href="cart.php" class="py-2 rounded-pill color-primary-bg">';
        echo '<span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>';
        echo '<span class="px-3 py-2 rounded-pill text-dark bg-light">' . count($product->getData('cart')) . '</span>';
        echo '</a></li>';
    }
    ?>
</ul>

                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
 
          
        </div>
    </nav>
    <!-- !Primary Navigation -->

</header>
<!-- !start #header -->

<!-- start #main-site -->
<main id="main-site">

