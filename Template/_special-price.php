<!-- New Product -->
<?php
$brand = array_map(function ($pro){ return $pro['item_brand']; }, $product_shuffle);
$unique = array_unique($brand);
sort($unique);
shuffle($product_shuffle);

// Check if the user is logged in
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];

    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['new_product_submit'])) {
            // Call the addToCart method
            $Cart->addToCart($userId, $_POST['item_id']);
        }
    }

    // Get the cart items for the logged-in user
    $in_cart = $Cart->getCartId($userId);
} else {
    // User is not logged in, set $in_cart to an empty array
    $in_cart = [];
}
?>

<section class="product spad" id="new-product">
    <div class="container">
        <h4 class="section-title">New Product</h4>
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">All Brand</button>
            <?php
                array_map(function ($brand) {
                    printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
                }, $unique);
            ?>
        </div>

        <div class="grid">
            <?php array_map(function ($item) use ($in_cart) { ?>
                <div class="grid-item border <?php echo $item['item_brand'] ?? "Brand"; ?>" style="margin-bottom: 20px;">
                    <div class="item py-2" style="width: 200px;">
                        <div class="product__item__pic">
                            <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>">
                                <img src="<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid" style="max-width: 100%; height: auto;">
                            </a>
                            <div class="product__item__text">
                                <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                                <div class="rating">
                                    <?php
                                    // Assuming you have a rating value, replace this with your logic
                                    for ($i = 1; $i <= 5; $i++) {
                                        echo '<i class="fa fa-star"></i>';
                                    }
                                    ?>
                                </div>
                                <div class="price py-2">
                                    <span>$<?php echo $item['item_price'] ?? 0; ?></span>
                                </div>
                                <?php if ($item['productcount'] > 0) { ?>
                                    <form method="post">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                                        <?php
                                        if (in_array($item['item_id'], $in_cart ?? [])) {
                                            echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                        } else {
                                            echo '<button type="submit" name="new_product_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                        }
                                        ?>
                                    </form>
                                <?php } else { ?>
                                    <p class="text-danger">Product Not Available</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }, $product_shuffle) ?>
        </div>
    </div>
</section>


<!-- !New Product -->
<style>
    /* Additional CSS styles for the New Product section */
.section-title {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 30px;
    color: #333;
}

.button-group {
    margin-bottom: 20px;
}

.button-group .btn {
    margin-right: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 8px 15px;
    background-color: #f8f9fa;
    color: #333;
    font-size: 1rem;
    cursor: pointer;
}

.button-group .btn.is-checked {
    background-color: #007bff;
    color: #fff;
}

.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}

.grid-item {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.product-item {
    padding: 20px;
}

.product-image img {
    width: 100%;
    height: auto;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.product-info {
    text-align: center;
}

.product-name {
    font-size: 1.25rem;
    margin-bottom: 10px;
}

.rating {
    color: #f8b739;
    margin-bottom: 10px;
}

.price {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 15px;
}

.btn {
    font-size: 1rem;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-success {
    background-color: #28a745;
    color: #fff;
}

.btn-warning {
    background-color: #ffc107;
    color: #333;
}

.btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.grid-item {
        margin-bottom: 20px;
        margin-right: 20px; /* Add margin-right to create horizontal gaps */
    }

    .grid-item:last-child {
        margin-right: 0; /* Remove margin-right for the last item to prevent extra space */
    }

</style>