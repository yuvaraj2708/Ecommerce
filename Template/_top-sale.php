<section id="top-sale">
    <div class="container py-5">
        <h2 class="section-title mb-4">Top Sale</h2>
        <hr class="divider mb-4">
        <!-- Owl Carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) { ?>
                <div class="item">
                    <div class="product-card">
                        <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>">
                            <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="Product Image" class="product-image">
                        </a>
                        <div class="product-info">
                            <h3 class="product-name"><?php echo $item['item_name'] ?? "Unknown"; ?></h3>
                            <div class="product-rating">
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                                <span class="star">&#9733;</span>
                            </div>
                            <div class="product-price">$<?php echo $item['item_price'] ?? '0'; ?></div>
                            <?php if ($item['productcount'] > 0) { ?>
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                    <!-- No need to set user_id here -->
                                    <?php
                                    if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])) {
                                        echo '<button type="submit" disabled class="btn btn-success btn-add-to-cart">In Cart</button>';
                                    } else {
                                        echo '<button type="submit" name="top_sale_submit" class="btn btn-warning btn-add-to-cart">Add to Cart</button>';
                                    }
                                    ?>
                                </form>
                            <?php } else { ?>
                                <p class="text-danger">Product Not Available</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } // closing foreach function ?>
        </div>
        <!-- Owl Carousel End -->
    </div>
</section>
<style>/* Additional CSS styles for the top sale section */
.section-title {
    text-align: center;
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 30px;
}

.divider {
    border-top: 2px solid #333;
    width: 100px;
    margin: auto;
    margin-bottom: 30px;
}

.owl-carousel .owl-item .product-card {
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.product-image {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 8px;
    margin-bottom: 15px;
}

.product-info {
    text-align: center;
}

.product-name {
    font-size: 1.25rem;
    margin-bottom: 10px;
}

.product-rating {
    color: #f8b739;
    margin-bottom: 10px;
}

.product-price {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 15px;
}

.btn-add-to-cart {
    width: 100%;
    font-size: 1rem;
    padding: 10px 0;
    border-radius: 5px;
    cursor: pointer;
}

.btn-add-to-cart:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
</style>