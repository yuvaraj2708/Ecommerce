<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>
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
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
            <!-- Add more navigation items as needed -->
        </ul>
    </nav>

    <!-- User Account Content -->
    <section>
        <?php
        // Assume the user is logged in; you can implement proper authentication
        $loggedInUser = [
            'username' => 'john_doe',
            // Add more user data as needed
        ];
        ?>

        <!-- Login/Registration -->
        <div>
            <?php if (!isset($loggedInUser['username'])): ?>
                <h2>Login/Registration</h2>
                <!-- Add your login and registration form fields here -->
            <?php else: ?>
                <h2>Welcome, <?php echo $loggedInUser['username']; ?>!</h2>
            <?php endif; ?>
        </div>

        <!-- Order History -->
        <div>
            <h2>Order History</h2>
            <?php
            // Sample order history - Replace with actual data from your database
            $orderHistory = [
                ['order_id' => '123456', 'date' => '2024-03-05', 'total' => 49.98],
                ['order_id' => '789012', 'date' => '2024-03-01', 'total' => 29.99],
                // Add more order history items as needed
            ];

            if (isset($loggedInUser['username'])) {
                foreach ($orderHistory as $order) {
                    echo '<p>Order ID: ' . $order['order_id'] . ', Date: ' . $order['date'] . ', Total: $' . number_format($order['total'], 2) . '</p>';
                }
            } else {
                echo '<p>Login to view your order history.</p>';
            }
            ?>
        </div>

        <!-- Wish List -->
        <div>
            <h2>Wish List</h2>
            <?php
            // Sample wish list - Replace with actual data from your database
            $wishList = [
                ['product_id' => '1', 'name' => 'Product 1', 'price' => 19.99],
                ['product_id' => '2', 'name' => 'Product 2', 'price' => 29.99],
                // Add more wish list items as needed
            ];

            if (isset($loggedInUser['username'])) {
                foreach ($wishList as $item) {
                    echo '<p>' . $item['name'] . ' - $' . number_format($item['price'], 2) . '</p>';
                }
            } else {
                echo '<p>Login to view your wish list.</p>';
            }
            ?>
        </div>

        <!-- Account Information Update -->
        <div>
            <?php if (isset($loggedInUser['username'])): ?>
                <h2>Account Information Update</h2>
                <!-- Add your form fields for updating account information -->
            <?php endif; ?>
        </div>
    </section>

    <!-- Add your footer with links and other information -->
    <footer>
        <p>&copy; 2024 Your E-Commerce Website. All rights reserved.</p>
    </footer>
</body>
</html>
