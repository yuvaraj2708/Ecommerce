<?php
session_start(); // Start the session to store cart data

// Establish a database connection (replace with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch featured products data from the product table
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Initialize $featuredProducts as an empty array
$featuredProducts = [];

if ($result->num_rows > 0) {
    while ($product = $result->fetch_assoc()) {
        $featuredProducts[] = $product;
    }
} else {
    echo 'No products available.';
}

// Close the database connection
$conn->close();

// Your existing code for fetching and displaying products

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = 1; // You can customize this based on user input

    // Establish a new connection to fetch product details
    $conn_product = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn_product->connect_error) {
        die("Connection failed: " . $conn_product->connect_error);
    }

    // Fetch product details from the database based on $product_id
    $sql_product = "SELECT * FROM products WHERE product_id = $product_id";
    $result_product = $conn_product->query($sql_product);

    if ($result_product->num_rows > 0) {
        $product = $result_product->fetch_assoc();

        // Create a cart item array
        $cart_item = [
            'product_id' => $product_id,
            'product_name' => $product['product_name'],
            'quantity' => $quantity,
            'price' => $product['price'],
        ];

        // Initialize the cart if it doesn't exist
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Check if the product is already in the cart
        $existing_key = array_search($product_id, array_column($_SESSION['cart'], 'product_id'));

        if ($existing_key !== false) {
            // Product already exists in the cart, update the quantity
            $_SESSION['cart'][$existing_key]['quantity'] += $quantity;
        } else {
            // Product doesn't exist in the cart, add it
            $_SESSION['cart'][] = $cart_item;
        }
    }

    // Close the product database connection
    $conn_product->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your E-Commerce Website</title>
    <!-- Add your CSS styles or link to a stylesheet here -->
    <style>
        /* Add your styles here */
    </style>
</head>
<body>
    <!-- Navigation Menu -->
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">blog</a></li>
            <li><a href="product.php">Product</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
            <!-- Add more navigation items as needed -->
        </ul>
    </nav>

    <!-- Search Bar -->
    <div>
        <input type="text" placeholder="Search...">
        <button type="submit">Search</button>
    </div>

    <!-- Display your products -->
    <section>
    <h2>Featured Products</h2>
    <?php
    // Your existing code for displaying products
    foreach ($featuredProducts as $product) {
        echo '<div class="product-card">';
        echo '<form method="post">';
        echo '<input type="hidden" name="product_id" value="' . $product['product_id'] . '">';
        echo '<img src="' . $product['image_path'] . '" alt="' . $product['product_name'] . '">';
        echo '<h3>' . $product['product_name'] . '</h3>';
        echo '<p>' . $product['description'] . '</p>';
        echo '<span>' . $product['price'] . '</span>';
        echo '<button type="submit" name="add_to_cart">Add to Cart</button>';
        echo '</form>';
        echo '</div>';
    }
    ?>
</section>

    <!-- Special Offers -->
    <section>
        <h2>Special Offers</h2>
        <?php
        // Add your PHP code to fetch and display special offers
        ?>
    </section>

    <!-- New Arrivals -->
    <section>
        <h2>New Arrivals</h2>
        <?php
        // Add your PHP code to fetch and display new arrivals
        ?>
    </section>

    <!-- Customer Reviews/Testimonials -->
    <section>
        <h2>Customer Reviews/Testimonials</h2>
        <?php
        // Establish a new database connection for testimonials (replace with your actual database credentials)
        $conn_testimonials = new mysqli($servername, $username, $password, $dbname);

        if ($conn_testimonials->connect_error) {
            die("Connection failed: " . $conn_testimonials->connect_error);
        }

        // Fetch testimonials data from the testimonials table
        $sql_testimonials = "SELECT * FROM testimonials"; // Replace 'testimonials' with your actual testimonials table name
        $result_testimonials = $conn_testimonials->query($sql_testimonials);

        if ($result_testimonials->num_rows > 0) {
            while ($testimonial = $result_testimonials->fetch_assoc()) {
                echo '<div class="testimonial">';
                echo '<p>"' . $testimonial['text'] . '"</p>';
                echo '<p>- ' . $testimonial['author'] . '</p>';
                echo '</div>';
            }
        } else {
            echo 'No testimonials available.';
        }

        // Close the testimonials database connection
        $conn_testimonials->close();
        ?>
    </section>

    <!-- Add your footer with links and other information -->
    <footer>
        <p>&copy; 2024 Your E-Commerce Website. All rights reserved.</p>
    </footer>
</body>
</html>
