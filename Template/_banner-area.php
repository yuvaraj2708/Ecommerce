<section id="banner-area" class="categories">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div id="largeCategoryItem" class="categories__item categories__large__item set-bg" 
                    style="background-image: url('img/categories/category-1.jpg')">
                    <div class="categories__text">
                        <h1>Women’s fashion</h1>
                        <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                        edolore magna aliquapendisse ultrices gravida.</p>
                        <a href="./shop.php">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" style="background-image: url('img/categories/category-2.jpg')">
                            <div class="categories__text">
                                <h4>Steel Items</h4>
                                <p>358 items</p>
                                <a href="./shop.php">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/category-3.jpg" style="background-image: url('img/categories/category-3.jpg')">
                            <div class="categories__text">
                                <h4>Sunglasses</h4>
                                <p>273 items</p>
                                <a href="./shop.php">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/category-4.jpg" style="background-image: url('img/categories/category-4.jpg')">
                            <div class="categories__text">
                                <h4>Smart Watches</h4>
                                <p>159 items</p>
                                <a href="./shop.php">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/category-5.jpg" style="background-image: url('img/categories/category-5.jpg')">
                            <div class="categories__text">
                                <h4>Pillows</h4>
                                <p>792 items</p>
                                <a href="./shop.php">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- !Owl-carousel -->
<script>
    const categoryItems = document.querySelectorAll('.categories__item');
    const images = ['img/categories/category-1.jpg', 'img/categories/category-2.jpg', 'img/categories/category-3.jpg', 'img/categories/category-4.jpg', 'img/categories/category-5.jpg']; // Add paths to your images

    let index = 0;

    setInterval(() => {
        index = (index + 1) % images.length;
        categoryItems.forEach((item, i) => {
            item.style.backgroundImage = `url('${images[(index + i) % images.length]}')`;
        });
    }, 2000); // Change image every 2 seconds (2000 milliseconds)
</script>
