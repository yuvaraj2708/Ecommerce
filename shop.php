<?php
// Establish the database connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'rahman';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Include the header file and pass the $conn variable
include('header.php');
?>

<?php

include ('Template/_special-price.php');
include ('Template/_banner-ads.php');


?>

<?php
// include footer.php file
include ('footer.php');
?>