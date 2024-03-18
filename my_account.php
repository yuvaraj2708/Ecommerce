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


// Check if the user is logged in
if (isset($_SESSION['id']) && isset($_SESSION['role'])) {
    // User is logged in
    echo '<p>Welcome, ' . $_SESSION['username'] . '</p>';
    echo '<a href="logout.php">Logout</a>';
} else {
    // User is not logged in
    echo '<p>You are not logged in.</p>';
}
?>

<?php 
include('footer.php');