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
 <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__address">
                            <h5>Contact info</h5>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-map-marker"></i> Address</h6>
                                    <p>Newno46 Oldno269 
Bharathisalai Triplicane
Chennai 600005</p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone"></i> Phone</h6>
                                    <p><span>044 42155200
</span><span>044 42155272
</span></p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone"></i> Whatsapp </h6>
                                    <p><span>9786526526
                                </li>
                                <li>
                                    <h6><i class="fa fa-headphones"></i> Support</h6>
                                    <p>rahmanplaza@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                      
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15546.412284101418!2d80.28290216804183!3d13.060918809581665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a52689fa38b54df%3A0x23094a4f8fdab82c!2sRahman%20Plaza!5e0!3m2!1sen!2sin!4v1710743321992!5m2!1sen!2sin" width="600" height="580" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Instagram Begin -->
<div class="instagram">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg" style="background-image: url('img/instagram/insta-1.jpg')">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">rahmanplaza</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg" style="background-image: url('img/instagram/insta-2.jpg')">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">rahmanplaza</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg" style="background-image: url('img/instagram/insta-3.jpg')">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">rahmanplaza</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg" style="background-image: url('img/instagram/insta-4.jpg')">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">rahmanplaza</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg" style="background-image: url('img/instagram/insta-5.jpg')">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">rahmanplaza</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" src="img/instagram/insta-6.jpg" style="background-image: url('img/instagram/insta-6.jpg')">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">rahmanplaza</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
<?php
// include footer.php file
include ('footer.php');
?>