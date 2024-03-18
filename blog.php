<?php
// Establish the database connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'rahman';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Include the header file and pass the $conn variable
include('header.php');
?>

    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic large__item set-bg" data-setbg="img/blog/blog-1.jpg"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">5 Timeless Handbag Styles Every Woman Should Own</a></h6>
                            <ul>
                                <li><span>Discuss classic handbag designs that never go out of style, such as the tote, clutch, crossbody, etc.</span></li>
                              
                            </ul>
                        </div>
                    </div>
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-7.jpg"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">How to Choose the Perfect Handbag for Every Occasion</a></h6>
                            <ul>
                                <li><span> Offer tips and advice on selecting the right handbag for different events and settings, from casual outings to formal events.</span></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-9.jpg"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">Handbag Care 101: Tips for Keeping Your Bag Looking Like New</a></h6>
                            <ul>
                                <li><span>Provide simple maintenance tips to help readers preserve the quality and appearance of their handbags.</span></li>
                                </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-2.jpg"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">The Evolution of Handbag Trends: From Vintage to Modern</a></h6>
                            <ul>
                                <li><span>Take readers on a journey through the history of handbag fashion, highlighting iconic designs and trends from different eras.</span></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-4.jpg"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">DIY Handbag Makeover: Creative Ways to Refresh Your Old Bags</a>
                            </h6>
                            <ul>
                                <li><span>Share fun and budget-friendly ideas for updating and customizing existing handbags to give them a fresh new look.</span></li>
                             
                            </ul>
                        </div>
                    </div>
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-8.jpg"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">How to Spot a Fake Designer Handbag: Expert Tips for Authenticity</a></h6>
                            <ul>
                                <li><span>Educate readers on identifying counterfeit handbags and offer guidance on purchasing authentic designer pieces.</span></li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-10.jpg"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">Handbags and Body Language: What Your Bag Choice Says About You</a></h6>
                            <ul>
                                <li><span>Explore the psychological aspects of handbag choices and how they can reflect personality traits and moods.</span></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-3.jpg"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">Sustainable Handbag Brands: Ethical and Eco-Friendly Options to Consider</a></h6>
                            <ul>
                                <li><span>Showcase environmentally conscious handbag brands that prioritize sustainable materials and ethical manufacturing practices.</span></li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-5.jpg"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">Accessorizing with Handbags</a></h6>
                            <ul>
                                <li><span>Tips for Matching Bags with Outfits": Provide styling tips on coordinating handbags with different clothing styles, colors, and occasions.</span></li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="blog__item">
                        <div class="blog__item__pic large__item set-bg" data-setbg="img/blog/blog-6.jpg"></div>
                        <div class="blog__item__text">
                            <h6><a href="#">The Ultimate Handbag Packing Guide</a></h6>
                            <ul>
                                <li><span>Essentials for Every Bag": Offer a checklist of must-have items to keep in your handbag, from beauty essentials to emergency supplies.</span></li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-12 text-center">
                    <a href="#" class="primary-btn load-btn">Load more posts</a>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
  <!-- Breadcrumb Begin -->
  <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./blog.html">Blog</a>
                        <span>Being seen: how is age diversity effecting change in Rahman Plaza and beauty?</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="blog__details__content">
                        <div class="blog__details__item">
                            <img src="img/blog/details/blog-details.jpg" alt="">
                            <div class="blog__details__item__title">
                                <span class="tip">Street style</span>
                                <h4>"The Influence of Handbags on Fashion and Culture"</h4>
                                <!-- <ul>
                                    <li>by <span>Ema Timahe</span></li>
                                    <li>Seb 17, 2019</li>
                                    <li>39 Comments</li>
                                </ul> -->
                            </div>
                        </div>
                        <div class="blog__details__desc">
                            <p>Explore the significant impact that handbags have had on fashion trends and cultural movements throughout history. Discuss how handbags have evolved from purely functional accessories to iconic fashion statements.
                            Trace the evolution of handbag styles from ancient times to the modern era. Discuss how changes in fashion, technology, and societal norms have influenced the design and popularity of handbags over time.
                            </p>
                        </div>
                        <div class="blog__details__quote">
                            <div class="icon"><i class="fa fa-quote-left"></i></div>
                            <p>Iconic Handbag Designs:</p>
                        </div>
                        <div class="blog__details__desc">
                            <p>Highlight some of the most iconic handbag designs in fashion history, such as the Chanel 2.55, the Hermès Birkin, and the Louis Vuitton Speedy. Discuss the stories behind these iconic bags and their enduring appeal.</p>
                        </div>
                        <div class="blog__details__tags">
                            <a href="#">FRahman Plaza</a>
                            <a href="#">Street style</a>
                            <a href="#">Diversity</a>
                            <a href="#">Beauty</a>
                        </div>
                        <div class="blog__details__btns">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog__details__btn__item">
                                        <h6><a href="#"><i class="fa fa-angle-left"></i> Previous posts</a></h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog__details__btn__item blog__details__btn__item--next">
                                        <h6><a href="#">Next posts <i class="fa fa-angle-right"></i></a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog__details__comment">
                            <h5>3 Comment</h5>
                            <a href="#" class="leave-btn">Leave a comment</a>
                            <div class="blog__comment__item">
                                <div class="blog__comment__item__pic">
                                    <img src="img/blog/details/comment-1.jpg" alt="">
                                </div>
                                <div class="blog__comment__item__text">
                                    <h6>arjun</h6>
                                    <p>Beautifully crafted handbags are like wearable works of art! I love how they can instantly elevate any outfit and make a statement about personal style.</p>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i> Jan 17, 2024</li>
                                        <li><i class="fa fa-heart-o"></i> 12</li>
                                        <li><i class="fa fa-share"></i> 1</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog__comment__item blog__comment__item--reply">
                                <div class="blog__comment__item__pic">
                                    <img src="img/blog/details/comment-2.jpg" alt="">
                                </div>
                                <div class="blog__comment__item__text">
                                    <h6>Sri Sai</h6>
                                    <p>Handbags are not just accessories; they're expressions of individuality and identity. Each bag tells a unique story and holds memories of the places we've been and the experiences we've had.</p>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i> Feb 17, 2024</li>
                                        <li><i class="fa fa-heart-o"></i> 12</li>
                                        <li><i class="fa fa-share"></i> 1</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog__comment__item">
                                <div class="blog__comment__item__pic">
                                    <img src="img/blog/details/comment-3.jpg" alt="">
                                </div>
                                <div class="blog__comment__item__text">
                                    <h6>mohammad</h6>
                                    <p>As a collector, I'm constantly amazed by the intricate details and exquisite craftsmanship of luxury handbags. It's like owning a piece of fashion history and being part of a community that shares a passion for timeless elegance.</p>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i> Mar 17, 2024</li>
                                        <li><i class="fa fa-heart-o"></i> 12</li>
                                        <li><i class="fa fa-share"></i> 1</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
                            <ul>
                                <li><a href="#">All <span>(250)</span></a></li>
                                <li><a href="#">Rahman Plaza week <span>(80)</span></a></li>
                                <li><a href="#">Street style <span>(75)</span></a></li>
                                <li><a href="#">Lifestyle <span>(35)</span></a></li>
                                <li><a href="#">Beauty <span>(60)</span></a></li>
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <div class="section-title">
                                <h4>Feature posts</h4>
                            </div>
                            <a href="#" class="blog__feature__item">
                                <div class="blog__feature__item__pic">
                                    <img src="img/blog/sidebar/fp-1.jpg" alt="">
                                </div>
                                <div class="blog__feature__item__text">
                                    <h6>Amf Cannes Red Carpet Celebrities Kend...</h6>
                                    <span>Seb 17, 2019</span>
                                </div>
                            </a>
                            <a href="#" class="blog__feature__item">
                                <div class="blog__feature__item__pic">
                                    <img src="img/blog/sidebar/fp-2.jpg" alt="">
                                </div>
                                <div class="blog__feature__item__text">
                                    <h6>Amf Cannes Red Carpet Celebrities Kend...</h6>
                                    <span>Seb 17, 2019</span>
                                </div>
                            </a>
                            <a href="#" class="blog__feature__item">
                                <div class="blog__feature__item__pic">
                                    <img src="img/blog/sidebar/fp-3.jpg" alt="">
                                </div>
                                <div class="blog__feature__item__text">
                                    <h6>Amf Cannes Red Carpet Celebrities Kend...</h6>
                                    <span>Seb 17, 2019</span>
                                </div>
                            </a>
                        </div>
                        <div class="blog__sidebar__item">
                            <div class="section-title">
                                <h4>Tags cloud</h4>
                            </div>
                            <div class="blog__sidebar__tags">
                                <a href="#">Rahman Plaza</a>
                                <a href="#">Street style</a>
                                <a href="#">Diversity</a>
                                <a href="#">Beauty</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instagram Begin -->
    <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="https://www.instagram.com/rahmanplaza?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">@ Rahman Plaza</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="https://www.instagram.com/rahmanplaza?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">@ Rahman Plaza</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="https://www.instagram.com/rahmanplaza?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">@ Rahman Plaza</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="https://www.instagram.com/rahmanplaza?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">@ Rahman Plaza</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="https://www.instagram.com/rahmanplaza?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">@ Rahman Plaza</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-6.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="https://www.instagram.com/rahmanplaza?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">@ Rahman Plaza</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Instagram End -->

    <?php
// include footer.php file
include ('footer.php');
?>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>