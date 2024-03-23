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
<?php
$brand = array_map(function ($pro){ return $pro['item_brand']; }, $product_shuffle);
$unique = array_unique($brand);
sort($unique);
shuffle($product_shuffle);

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];

    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['new_product_submit'])) {
            // Call the addToCart method
            $Cart->addToCart($userId, $_POST['item_id']);
        }
    }

    // Get the cart items for the logged-in user
    $in_cart = $Cart->getCartId($userId);
} else {
    // User is not logged in, set $in_cart to an empty array
    $in_cart = [];
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
    <title>Rahman Plaza</title>

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
    <a href="./index.php">
        <img src="img/logo.png" alt="">
        
    </a>
</div>

<div class="">
<h1 style="margin-top:35px; width:250px; font-size:40px; font-family:popins">RahmanPlaza</h1>
</div>
                <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                <ul>
    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'class="active"' : ''; ?>><a href="./index.php">Home</a></li>
    <li class="dropdown">
    <a href="./shop.php" class="dropdown-toggle <?php echo (basename($_SERVER['PHP_SELF']) == 'shop.php') ? 'active' : ''; ?>">Shop</a>
    <div class="dropdown-menu">
        <?php
        // Loop through brands and display them in three columns
        $counter = 0;
        foreach ($unique as $brand) {
            // If counter is divisible by 3, start a new row
            if ($counter % 3 == 0) {
                echo '<div style="clear:both;"></div>'; // Clear float to start a new row
            }
            printf('<a href="./shop.php?filter=%s">%s</a>', $brand, $brand);
            $counter++;
        }
        ?>
    </div>
</li>
    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'blog.php') ? 'class="active"' : ''; ?>><a href="./blog.php">Blog</a></li>
    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'class="active"' : ''; ?>><a href="./contact.php">Contact</a></li>
    <li <?php echo (basename($_SERVER['PHP_SELF']) == 'career.php') ? 'class="active"' : ''; ?>><a href="./career.php">Career</a></li>
    <?php
    if (isset($_SESSION['id']) && isset($_SESSION['role'])) {
        // User is logged in
        echo '<li><a href="./my_account.php">My Account</a></li>';
        // echo '<li><a href="./logout.php">Logout</a></li>';
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
   
                    <?php
// Establish MySQLi database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'rahman';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Your existing code
if (isset($_SESSION['id'])) {
    // Show the cart count only if the user is logged in
    $userId = $_SESSION['id'];
    $query = "SELECT COUNT(*) AS cart_count FROM cart WHERE user_id = $userId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $cartCount = $row['cart_count'];

    echo '<li><a href="cart.php" class="py-2 rounded-pill color-primary-bg">';
    echo '<span class="icon_heart_alt"></span>';
    echo '<span class="tip">' . $cartCount . '</span>';
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
<?php
// Example usage of $conn
$result = mysqli_query($conn, "SELECT COUNT(*) FROM cart");
if ($result) {
    // Process the query result
} else {
    // Handle the query error
}
?>
<!-- start #main-site -->
<main id="main-site">

<style>
    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #fff;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        width: auto; /* Adjust width to fit content */
        padding: 10px;
        min-width: 200px; /* Set minimum width to avoid collapsing */
        border: 1px solid #ddd; /* Add border for separation */
        border-radius: 5px; /* Add border radius for rounded corners */
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    .dropdown-menu a {
        color: black;
        text-decoration: none;
        display: block;
        padding: 10px;
    }

    .dropdown-menu a:hover {
        background-color: #f1f1f1;
    }

    /* Add styling to create grid layout */
    .dropdown-menu .menu-column {
        display: inline-block;
        vertical-align: top;
        width: 33.33%; /* Set width for three columns */
        padding: 0 10px; /* Add padding for spacing between columns */
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var dropdownMenu = document.querySelector('.dropdown-menu');

        // Add click event listeners to all dropdown items
        dropdownMenu.querySelectorAll('a').forEach(function (item) {
            item.addEventListener('click', function (event) {
                // Prevent the default link behavior
                event.preventDefault();
                // Get the filter value from the link's href attribute
                var filter = this.getAttribute('href').split('=')[1];
                // Navigate to shop.php with the filter query parameter
                window.location.href = './shop.php?filter=' + filter;
            });
        });
    });
</script>