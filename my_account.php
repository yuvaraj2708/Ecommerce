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

// Include the header file
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<body>
<header>
        <nav>
            <div class="container">
                <h1>My Account</h1>
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
            </div>
        </nav>
    </header>
    <!-- Include the footer file -->
    <?php include('footer.php'); ?>
</body>
</html>

<style>
     header {
            
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

</style>