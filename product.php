
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

    /*  include products */
    include ('Template/_products.php');
    /*  include products */

    /*  include top sale section */
    include ('Template/_top-sale.php');
    /*  include top sale section */

?>

<?php
// include footer.php file
include ('footer.php');
?>

