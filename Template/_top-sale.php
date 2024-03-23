<section id="new-phones">
    <div class="container">
        <h2 class="section-title mb-4">Top Sales</h2>
        <hr class="divider mb-4">

        <!-- Owl Carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) { ?>
                <div class="item">
                    <div class="product-card">
                        <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>" class="product__item__pic">
                            <div class="image-overlay"></div>
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
                            <div class="product-price">₹ <?php echo $item['item_price'] ?? '0'; ?></div>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
                                <?php if ($item['productcount'] > 0) { ?>
                                    <?php
                                    if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])) {
                                        echo '<button type="submit" disabled class="btn btn-success btn-add-to-cart">In Cart</button>';
                                    } else {
                                        echo '<button type="submit" name="new_phones_submit" class="btn btn-warning btn-add-to-cart">Add to Cart</button>';
                                    }
                                    ?>
                                <?php } else { ?>
                                    <p class="text-danger">Product Not Available</p>
                                <?php } ?>
                            </form>
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

.product-card {
    position: relative;
    background-color: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    width: 220px;
    height: 450px;
}

.product__item__pic {
    position: relative;
    overflow: hidden;
    display: block;
}

.product__item__pic img {
    max-width: 100%;
    max-height: 100%;
    height: auto;
    display: block;
    transition: transform 0.3s ease;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* Adjust the transparency here */
    z-index: 1;
    opacity: 0; /* Initially invisible */
    transition: opacity 0.3s ease;
}

.product-card:hover .image-overlay {
    opacity: 1; /* Make overlay visible on hover */
}

.product-info {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 20px;
    z-index: 2;
    color: #fff;
}

.product-info h3,
.product-info .product-rating,
.product-info .product-price {
    margin-bottom: 10px;
}

.product-info .btn-add-to-cart {
    width: 100%;
}

</style>