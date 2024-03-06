<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Add your CSS styles or link to a stylesheet here -->
    <style>
        /* Add your styles here */
    </style>
</head>
<body>
    <!-- Navigation Menu -->
    <nav>
        <ul>
            <li><a href="usermanagement.php">User Management</a></li>
            <li><a href="ordermanagement.php">Order Management</a></li>
            <li><a href="productmanagement.php">Products Management</a></li>
            <li><a href="analytics.php">Analytics</a></li>
            <!-- Add more navigation items as needed -->
        </ul>
    </nav>

    <!-- Admin Dashboard Content -->
    <section>
        <h2>Admin Dashboard - Overview</h2>

        <?php
        // Establish a database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ecommerce";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Total Users
        $userCountQuery = "SELECT COUNT(*) AS totalUsers FROM users";
        $userCountResult = $conn->query($userCountQuery);

        if ($userCountResult && $userCountResult->num_rows > 0) {
            $userCount = $userCountResult->fetch_assoc()['totalUsers'];
            echo '<div><h3>Total Users</h3><p>' . $userCount . ' users registered.</p></div>';
        } else {
            echo '<div><p>Error fetching user count.</p></div>';
        }

        // Total Orders
        $orderCountQuery = "SELECT COUNT(*) AS totalOrders FROM orders";
        $orderCountResult = $conn->query($orderCountQuery);

        if ($orderCountResult && $orderCountResult->num_rows > 0) {
            $orderCount = $orderCountResult->fetch_assoc()['totalOrders'];
            echo '<div><h3>Total Orders</h3><p>' . $orderCount . ' orders placed.</p></div>';
        } else {
            echo '<div><p>Error fetching order count.</p></div>';
        }

        // Total Products
        $productCountQuery = "SELECT COUNT(*) AS totalProducts FROM products";
        $productCountResult = $conn->query($productCountQuery);

        if ($productCountResult && $productCountResult->num_rows > 0) {
            $productCount = $productCountResult->fetch_assoc()['totalProducts'];
            echo '<div><h3>Total Products</h3><p>' . $productCount . ' products available.</p></div>';
        } else {
            echo '<div><p>Error fetching product count.</p></div>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </section>

    <!-- Add your footer with links and other information -->
    <footer>
        <p>&copy; 2024 Your E-Commerce Website. All rights reserved.</p>
    </footer>
</body>
</html>
