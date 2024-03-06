<?php
session_start(); // Start the session to access cart data

// Your existing code for displaying the cart
?>

<!-- Display your cart items -->
<section>
    <h2>Shopping Cart</h2>

    <!-- List of Added Products -->
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    echo '<tr>';
                    echo '<td>' . $item['product_name'] . '</td>';
                    echo '<td>' . $item['quantity'] . '</td>';
                    echo '<td>$' . $item['price'] . '</td>';
                    echo '<td>$' . number_format($item['quantity'] * $item['price'], 2) . '</td>';
                    echo '<td><button>Remove</button></td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5">Your cart is empty.</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <!-- Subtotal -->
    <div>
        <p>Subtotal: $<?php
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $subtotal = array_sum(array_map(function ($item) {
                    return $item['quantity'] * $item['price'];
                }, $_SESSION['cart']));
                echo number_format($subtotal, 2);
            } else {
                echo '0.00';
            }
        ?></p>
    </div>

    <!-- Checkout Button -->
    <div>
            <a href="checkout.php"><button>Checkout</button></a>
        </div>
</section>
