<?php
// Logic to determine the image path dynamically
// This can be based on parameters passed to the script, database queries, etc.
$imagePath = "img/discount.jpg";
$shopNowLink = "#"; // Default shop now link
$discountTitle = "Discount"; // Default discount title
$summerTitle = "Summer 2019"; // Default summer title
$salePercentage = "50%"; // Default sale percentage

$days = 22; // Default number of days
$hours = 18; // Default number of hours
$minutes = 46; // Default number of minutes
$seconds = 5; // Default number of seconds

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file is selected
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        // Define target directory
        $targetDir = "img/";

        // Generate a unique filename
        $newFilename = uniqid() . '_' . $_FILES['image']['name'];
        
        // Set target path
        $targetFilePath = $targetDir . $newFilename;

        // Check if file already exists
        if (file_exists($targetFilePath)) {
            // File already exists, handle error
            echo "Sorry, file already exists.";
        } else {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                // File uploaded successfully, update image path
                $imagePath = $targetFilePath;
            } else {
                // Error uploading file
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // No file selected or error occurred
        echo "Please select a file to upload.";
    }

    // Check if a shop now link is provided
    if (isset($_POST["shop_now_link"]) && !empty($_POST["shop_now_link"])) {
        $shopNowLink = $_POST["shop_now_link"];
    }

    // Check if discount title is provided
    if (isset($_POST["discount_title"]) && !empty($_POST["discount_title"])) {
        $discountTitle = $_POST["discount_title"];
    }

    // Check if summer title is provided
    if (isset($_POST["summer_title"]) && !empty($_POST["summer_title"])) {
        $summerTitle = $_POST["summer_title"];
    }

    // Check if sale percentage is provided
    if (isset($_POST["sale_percentage"]) && !empty($_POST["sale_percentage"])) {
        $salePercentage = $_POST["sale_percentage"];
    }

    // Check if countdown timer values are provided
    if (
        isset($_POST["days"]) && isset($_POST["hours"]) &&
        isset($_POST["minutes"]) && isset($_POST["seconds"]) &&
        !empty($_POST["days"]) && !empty($_POST["hours"]) &&
        !empty($_POST["minutes"]) && !empty($_POST["seconds"])
    ) {
        $days = $_POST["days"];
        $hours = $_POST["hours"];
        $minutes = $_POST["minutes"];
        $seconds = $_POST["seconds"];
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 p-0">
            <div class="discount__pic">
                <img src="<?php echo $imagePath; ?>" alt="Discount Image">
            </div>
        </div>
        <div class="col-lg-6 p-0">
            <div class="discount__text">
                <div class="discount__text__title">
                    <span><?php echo $discountTitle; ?></span>
                    <h2><?php echo $summerTitle; ?></h2>
                    <h5><span>Sale</span> <?php echo $salePercentage; ?></h5>
                </div>
                <div class="discount__countdown" id="countdown-time">
                    <div class="countdown__item">
                        <span><?php echo $days; ?></span>
                        <p>Days</p>
                    </div>
                    <div class="countdown__item">
                        <span><?php echo $hours; ?></span>
                        <p>Hour</p>
                    </div>
                    <div class="countdown__item">
                        <span><?php echo $minutes; ?></span>
                        <p>Min</p>
                    </div>
                    <div class="countdown__item">
                        <span><?php echo $seconds; ?></span>
                        <p>Sec</p>
                    </div>
                </div>
                <a href="<?php echo $shopNowLink; ?>">Shop now</a>
            </div>
        </div>
    </div>
</div>

<!-- Form to upload new image and change shop now link -->
<form method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="text" name="shop_now_link" placeholder="Enter Shop now link">
    <input type="text" name="discount_title" placeholder="Enter Discount Title">
    <input type="text" name="summer_title" placeholder="Enter Summer Title">
    <input type="text" name="sale_percentage" placeholder="Enter Sale Percentage">
    <input type="number" name="days" placeholder="Enter Days">
    <input type="number" name="hours" placeholder="Enter Hours">
    <input type="number" name="minutes" placeholder="Enter Minutes">
    <input type="number" name="seconds" placeholder="Enter Seconds">
    <input type="submit" value="Upload Image" name="submit">
</form>
