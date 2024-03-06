<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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

    <!-- Checkout Content -->
    <section>
        <h2>Checkout</h2>

        <!-- Customer Information -->
        <div>
            <h3>Customer Information</h3>
            <!-- Add your form fields for customer information (e.g., name, email) -->
        </div>

        <!-- Shipping Address -->
        <div>
            <h3>Shipping Address</h3>
            <!-- Add your form fields for shipping address -->
        </div>

        <!-- Billing Information -->
        <div>
            <h3>Billing Information</h3>
            <!-- Add your form fields for billing information -->
        </div>

        <!-- Payment Options -->
        <div>
            <h3>Payment Options</h3>
            <!-- Add your form fields for payment options (e.g., credit card details) -->
        </div>

        <!-- Order Summary -->
        <div>
            <h3>Order Summary</h3>
            <?php
session_start();

// Retrieve cart data from the session
$cartData = isset($_SESSION['cart_data']) ? $_SESSION['cart_data'] : [];

// Your existing code for the checkout page

// Order Summary
echo '<div>';
echo '<h3>Order Summary</h3>';

foreach ($cartData as $item) {
    echo '<p>' . $item['product_name'] . ' x ' . $item['quantity'] . ': $' . number_format($item['quantity'] * $item['price'], 2) . '</p>';
}

$total = array_sum(array_map(function ($item) {
    return $item['quantity'] * $item['price'];
}, $cartData));

echo '<p>Total: $' . number_format($total, 2) . '</p>';
echo '</div>';
?>

        </div>

        <!-- Place Order Button -->
        <div>
            <button>Place Order</button>
        </div>
    </section>

    <!-- Add your footer with links and other information -->
    <footer>
        <p>&copy; 2024 Your E-Commerce Website. All rights reserved.</p>
    </footer>
</body>
</html>
