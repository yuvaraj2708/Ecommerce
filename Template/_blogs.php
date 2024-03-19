
<!-- Blogs -->
<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rahman";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch discount data from the database
$sql = "SELECT * FROM ad";
$result = $conn->query($sql);

// Check if there are rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Start section.discount
        echo '<section class="discount">';
        echo '<div class="container">';
        echo '<div class="row">';
        
        // Output image column
        echo '<div class="col-lg-6 p-0">';
        echo '<div class="discount__pic">';
        echo '<img src="' . $row["discount_img"] . '" alt="">'; // Replace discount_img with the actual column name for the image URL
        echo '</div>';
        echo '</div>';
        
        // Start .col-lg-6.p-0
        echo '<div class="col-lg-6 p-0">';
        echo '<div class="discount__text">';
        echo '<div class="discount__text__title">';
        
        // Output discount title and sale percentage
        echo '<span>' . $row["discount_title"] . '</span>'; // Replace discount_title with the actual column name for the discount title
        echo '<h2>' . $row["discount_sale"] . '</h2>'; // Replace discount_sale with the actual column name for the discount sale percentage
        echo '<h5><span>Sale</span> ' . $row["discount_sale"] . '%</h5>'; // Assuming sale percentage is stored in the same column as discount_sale
        
        // End .discount__text__title
        echo '</div>';
        
        // Start .discount__countdown
        echo '<div class="discount__countdown" id="countdown-time">';
        
        // Output countdown items
        echo '<div class="countdown__item">';
        echo '<span>' . $row["countdown_days"] . '</span>'; // Replace countdown_days with the actual column name for days
        echo '<p>Days</p>';
        echo '</div>';
        
        echo '<div class="countdown__item">';
        echo '<span>' . $row["countdown_hours"] . '</span>'; // Replace countdown_hours with the actual column name for hours
        echo '<p>Hour</p>';
        echo '</div>';
        
        echo '<div class="countdown__item">';
        echo '<span>' . $row["countdown_minutes"] . '</span>'; // Replace countdown_minutes with the actual column name for minutes
        echo '<p>Min</p>';
        echo '</div>';
        
        echo '<div class="countdown__item">';
        echo '<span>' . $row["countdown_seconds"] . '</span>'; // Replace countdown_seconds with the actual column name for seconds
        echo '<p>Sec</p>';
        echo '</div>';
        
        // End .discount__countdown
        echo '</div>';
        
        // Shop now link
        echo '<a href="#">Shop now</a>';
        
        // End .discount__text
        echo '</div>';
        
        // End .col-lg-6.p-0
        echo '</div>';
        
        // End .row
        echo '</div>';
        
        // End .container
        echo '</div>';
        
        // End section.discount
        echo '</section>';
        
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!-- echo "<script>startCountdown('countdown-time', " . ($row['countdown_days'] * 86400 + $row['countdown_hours'] * 3600 + $row['countdown_minutes'] * 60 + $row['countdown_seconds']) . ");</script>"; -->


<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over $99</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
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
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg" style="background-image: url('img/instagram/insta-6.jpg')">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="https://www.instagram.com/rahmanplaza?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">rahmanplaza</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg" style="background-image: url('img/instagram/insta-2.jpg')">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="https://www.instagram.com/rahmanplaza?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">rahmanplaza</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg" style="background-image: url('img/instagram/insta-3.jpg')">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="https://www.instagram.com/rahmanplaza?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">rahmanplaza</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg" style="background-image: url('img/instagram/insta-4.jpg')">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="https://www.instagram.com/rahmanplaza?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">rahmanplaza</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg" style="background-image: url('img/instagram/insta-5.jpg')">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="https://www.instagram.com/rahmanplaza?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">rahmanplaza</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" src="img/instagram/insta-6.jpg" style="background-image: url('img/instagram/insta-6.jpg')">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="https://www.instagram.com/rahmanplaza?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">rahmanplaza</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- !Blogs -->
