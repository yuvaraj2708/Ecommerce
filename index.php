


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

    <!-- Featured Products -->
    <section>
        <h2>Featured Products</h2>
        <?php

// session_start();
// include 'utility_functions.php'; // Replace with the actual path

// checkLoggedIn();

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
        
        if ($result->num_rows > 0) {
            while ($product = $result->fetch_assoc()) {
                echo '<div class="product-card">';
                echo '<img src="' . $product['image_path'] . '" alt="' . $product['product_name'] . '">';
                echo '<h3>' . $product['product_name'] . '</h3>';
                echo '<p>' . $product['description'] . '</p>';
                echo '<span>' . $product['price'] . '</span>';
                echo '<button>Add to Cart</button>';
                echo '</div>';
            }
        } else {
            echo 'No products available.';
        }

        // Close the database connection
        $conn->close();
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
