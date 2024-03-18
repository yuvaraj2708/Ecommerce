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

// Check if the query parameter is set
if (isset($_GET['query'])) {
    // Sanitize the user input
    $searchQuery = htmlspecialchars($_GET['query']);

    // Construct the SQL query to search for products based on the user input
    $sql = "SELECT * FROM products WHERE item_name LIKE :searchQuery OR item_brand LIKE :searchQuery";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':searchQuery', "%$searchQuery%", PDO::PARAM_STR);
    $stmt->execute();
    $searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display search results
    foreach ($searchResults as $result) {
        echo "<p>{$result['item_name']}</p>";
    }
}
?>
