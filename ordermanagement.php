<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Order Management</title>
    <!-- Add your CSS styles or link to a stylesheet here -->
    <style>
        /* Add your styles here */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
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

    <!-- Admin Dashboard Content - Order Management -->
    <section>
        <h2>Admin Dashboard - Order Management</h2>

        <!-- View All Orders -->
        <div>
            <h3>View All Orders</h3>
            <?php
            // Replace with your actual database connection details
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ecommerce";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch all orders from the database
            $allOrdersQuery = "SELECT * FROM orders";
            $allOrdersResult = $conn->query($allOrdersQuery);

            if ($allOrdersResult && $allOrdersResult->num_rows > 0) {
                echo '<table>';
                echo '<tr><th>Order ID</th><th>User ID</th><th>Total Amount</th><th>Status</th><th>Action</th></tr>';

                while ($order = $allOrdersResult->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $order['order_id'] . '</td>';
                    echo '<td>' . $order['user_id'] . '</td>';
                    echo '<td>$' . number_format($order['total_amount'], 2) . '</td>';
                    echo '<td>' . $order['status'] . '</td>';
                    echo '<td><a href="order_details.php?order_id=' . $order['order_id'] . '">Details</a> | <a href="update_order_status.php?order_id=' . $order['order_id'] . '">Update Status</a></td>';
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo '<p>No orders found.</p>';
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </section>

    <!-- Add your footer with links and other information -->
    <footer>
        <p>&copy; 2024 Your E-Commerce Website. All rights reserved.</p>
    </footer>
</body>
</html>
