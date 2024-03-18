<!-- Shopping cart section -->
<?php
ob_start();
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete-cart-submit'])) {
        // Call deleteCart method
        $deletedrecord = $Cart->deleteCart($_POST['item_id']);
    }

    if (isset($_POST['wishlist-submit'])) {
        // Call saveForLater method
        $Cart->saveForLater($_POST['item_id']);
    }
}

$subTotal = 0; // Initialize subtotal

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    // Retrieve the logged-in user's ID
    $userId = $_SESSION['id'];
    
    // Fetch the cart items for the logged-in user
    $query = "SELECT * FROM cart WHERE user_id = $userId";
    $result = mysqli_query($conn, $query);

    // Check if cart items exist for the user
    if (mysqli_num_rows($result) > 0) {
?>
        <section id="cart" class="py-3 mb-5">
            <div class="container-fluid w-75">
                <h5 class="font-baloo font-size-20">Shopping Cart</h5>

                <!-- Shopping cart items -->
                <div class="row">
                    <div class="col-sm-9">
<?php
                        // Loop through each cart item
                        while ($item = mysqli_fetch_assoc($result)) {
                            // Get product details for the current item
                            $productId = $item['item_id'];
                            $productDetails = $product->getProduct($productId);
                            // Access the inner array to get the product details
                            $productDetails = $productDetails[0];

                            // Update subtotal
                            $subTotal += $productDetails['item_price'];
?>
                            <!-- Cart item -->
                            <div class="row border-top py-3 mt-3">
                                <div class="col-sm-2">
                                    <img src="<?php echo $productDetails['item_image'] ?? "./assets/products/1.png" ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                                </div>
                                <div class="col-sm-8">
                                    <h5 class="font-baloo font-size-20"><?php echo $productDetails['item_name'] ?? "Unknown"; ?></h5>
                                    <small>by <?php echo $productDetails['item_brand'] ?? "Brand"; ?></small>
                                    <!-- Product rating -->
                                    <div class="d-flex">
                                        <div class="rating text-warning font-size-12">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        </div>
                                        <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                                    </div>
                                    <!-- Product qty -->
                                    <div class="qty d-flex pt-2">
                                        <div class="d-flex font-rale w-25">
                                            <button class="qty-up border bg-light" data-id="<?php echo $productDetails['item_id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                            <input type="text" data-id="<?php echo $productDetails['item_id'] ?? '0'; ?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                            <button data-id="<?php echo $productDetails['item_id'] ?? '0'; ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                        </div>
                                        <form method="post">
                                            <input type="hidden" value="<?php echo $productDetails['item_id'] ?? 0; ?>" name="item_id">
                                            <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-2 text-right">
                                    <div class="font-size-20 text-danger font-baloo">
                                        $<span class="product_price" data-id="<?php echo $productDetails['item_id'] ?? '0'; ?>"><?php echo $productDetails['item_price'] ?? 0; ?></span>
                                    </div>
                                </div>
                            </div>
<?php
                        }
?>
                    </div>
                    <!-- Subtotal section -->
                    <div class="col-sm-3">
                        <div class="sub-total border text-center mt-2">
                            <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                            <div class="border-top py-4">
                                <h5 class="font-baloo font-size-20">Subtotal (<?php echo mysqli_num_rows($result); ?> item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo $subTotal; ?></span></span></h5>
                                <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                            </div>
                        </div>
                    </div>
                    <!-- !Subtotal section -->
                </div>
                <!-- Shopping cart items -->
            </div>
        </section>
<?php
    } else {
        echo "Your shopping cart is empty.";
    }
}
?>
