<?php
function fetch_products($sql) {
    // Assuming you have a database connection
    $conn = new mysqli('localhost', 'root', '', 'rahman');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform query
    $result = $conn->query($sql);

    $products = array();

    // Check if there are results
    if ($result->num_rows > 0) {
        // Fetch products from the result set
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    // Close connection
    $conn->close();

    return $products;
}
?>
<?php
// Assuming you have received the brand filter value from the URL parameter
$selected_brand = isset($_GET['filter']) ? $_GET['filter'] : null;

// Modify your SQL query to filter products by brand if a brand filter is selected
$sql = "SELECT * FROM product";
if ($selected_brand) {
    $sql .= " WHERE item_brand = '$selected_brand'";
}

// Execute the SQL query to fetch products
// (Assuming you have a function to fetch products from the database)
$product_shuffle = fetch_products($sql);
?>
<section class="product spad" id="new-product">
    <div class="container">
        <h4 class="section-title">All Product</h4>
        <div id="filters" class="button-group text-right font-baloo font-size-16">
    <!-- Button to display all brands -->
    <button class="btn btn-primary is-checked" data-filter="*">All Brands</button>

    <!-- PHP loop to generate buttons for each unique brand -->
    <?php foreach ($unique as $brand): ?>
        <button class="btn btn-secondary" data-filter=".<?= $brand ?>"><?= $brand ?></button>
    <?php endforeach; ?>
</div>

        <div class="grid">
            <?php array_map(function ($item) use ($in_cart) { ?>
                <div class="grid-item border  <?php echo $item['item_brand'] ?? "Brand"; ?>" style="margin-bottom: 20px;">
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



.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}

.grid-item {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Improved box shadow */
    padding: 30px;
    margin-bottom: 20px;
    margin-right: 20px;
    transition: all 0.3s ease; /* Smooth transition for hover effect */
}

.grid-item:hover {
    transform: translateY(-5px); /* Add a subtle lift effect on hover */
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2); /* Enhanced box shadow on hover */
}

.grid-item:last-child {
    margin-right: 0;
}

.product__item__pic {
    position: relative;
}

.product__item__pic img {
    max-width: 100%;
    height: auto;
    display: block;
    transition: transform 0.3s ease; /* Smooth transition for image zoom effect */
}

.product__item__pic:hover img {
    transform: scale(1.1); /* Zoom in effect on image hover */
}

.product__item__text {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 15px;
    background-color: rgba(255, 255, 255, 0.9);
    transition: background-color 0.3s ease; /* Smooth transition for background color */
}

.product__item__text:hover {
    background-color: rgba(255, 255, 255, 0.95); /* Lighten background color on hover */
}

.product__item__text h6 {
    font-size: 1.1rem;
    margin-bottom: 5px;
    color: #333;
}

.rating {
    color: #f8b739;
    margin-bottom: 8px;
}

.price {
    font-size: 1.2rem;
    font-weight: bold;
}

.btn {
    margin-top: 10px;
}

.btn:hover {
    opacity: 0.8; /* Reduce opacity on hover for better interaction */
}


    .button-group {
        margin-bottom: 20px;
    }

    .btn {
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }

    .btn-secondary {
        background-color: #ffc107;
    border-color: #dce1e4;
    color: #030303;
    }

    .is-checked {
        background-color: #28a745;
        border-color: #28a745;
    }

</style>
