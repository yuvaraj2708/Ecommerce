<!-- New Phones -->
<?php

shuffle($product_shuffle);

// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['new_phones_submit'])) {
        // Check if the user is logged in
        if(isset($_SESSION['id'])) {
            
            // User is logged in, proceed to add item to the cart
            $Cart->addToCart($_SESSION['id'], $_POST['item_id']);
        } else {
            // User is not logged in, redirect to the login page
            header("Location: login.php");
            exit; // Stop further execution
        }
    }
}
?>

<section id="new-phones">
    <div class="container">
        <h2 class="section-title mb-4">New Sales</h2>
        <hr class="divider mb-4">

        <!-- Owl Carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) { ?>
                <div class="item">
                    <div class="product-card">
                        <div class="product-overlay"></div> <!-- Transparent square screen overlay -->
                        <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']); ?>" class="product__item__pic">
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
                                <input type="hidden" name="user_id" value='<?php
                                                      
                                                      if($uses != ""){ 
                                                        echo"$uses";
                                                      }else{
                                                        echo"User Unknown";
                                                      }
                                                      ?>'>
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

<!-- !New Phones -->

        <!-- !owl carousel -->


<section class="trend spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Bags</h4>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/ht-1.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Handbag</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">₹ 59.0</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/ht-2.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Sling Bag</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">₹ 59.0</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/ht-3.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Travel Bag</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">₹ 59.0</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Home Appliances</h4>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/bs-1.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Table Fan</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">₹ 59.0</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/bs-2.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Wall Fan</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">₹ 59.0</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/bs-3.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Ceiling Fan</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">₹ 59.0</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Steel</h4>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/f-1.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Kadai</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">₹ 59.0</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/f-2.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Idly Pot</h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">₹ 59.0</div>
                        </div>
                    </div>
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="img/trend/f-3.jpg" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>Urali</h6>
                            <div class="rating">
                            <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">₹ 59.0</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- !New Phones -->

<style>
    /* Additional CSS styles for the new phones section */
   /* Additional CSS styles for the new phones section */
.product-card {
    background-color: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    width: 220px; /* Fixed width */
    height: 450px; /* Increased height */
    margin-bottom: 30px; /* Add margin between each product card */
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
}

.product__item__pic {
    position: relative;
    overflow: hidden; /* Ensure the image doesn't overflow its container */
}

.product__item__pic img {
    max-width: 100%; /* Ensure the image doesn't exceed its container's width */
    height: auto; /* Maintain aspect ratio */
    display: block;
    transition: transform 0.3s ease; /* Smooth transition for image zoom effect */
}

.product-image {
    width: 100%;
    height: auto;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.product-info {
    padding: 20px;
}

.product-name {
    font-size: 1.25rem;
    margin-bottom: 10px;
    color: #333333;
}

.product-rating {
    color: #f8b739;
    margin-bottom: 10px;
}

.product-price {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333333;
    margin-bottom: 15px;
}

.btn-add-to-cart {
    width: 100%;
    font-size: 1rem;
    padding: 10px 0;
    border-radius: 5px;
    background-color: #ffa500;
    color: #ffffff;
    border: none;
    cursor: pointer;
}

.btn-add-to-cart:hover {
    background-color: #ff7c00;
}


</style>