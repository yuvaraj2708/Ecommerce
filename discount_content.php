<?php
include('staffheader.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discount Content</title>
    <style>
       
       table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .discount {
            padding: 40px 0;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .discount__text {
            padding: 20px;
        }

        .discount__text__title {
            margin-bottom: 20px;
        }

        .discount__text__title span {
            color: #ff6f61;
            font-size: 18px;
        }

        .discount__text__title h2 {
            color: #333;
            font-size: 28px;
            margin: 10px 0;
        }

        .discount__text__title h5 {
            color: #00b894;
            font-size: 24px;
            margin: 10px 0;
        }

        .discount-form {
            background-color: #f9f9f9;
            padding: 40px 0;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .discount-form h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .discount-form label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            font-size: 18px;
        }

        .discount-form input[type="text"],
        .discount-form input[type="number"],
        .discount-form input[type="file"],
        .discount-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .discount-form input[type="submit"] {
            background-color: #00b894;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .discount-form input[type="submit"]:hover {
            background-color: #00818a;
        }
    </style>
</head>
<body>
<?php
// Define your database connection parameters
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Change this if you have a different username
$password = ""; // Change this if you have set a password for your database
$dbname = "rahman"; // Your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a delete request is made
if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    
    // SQL to delete a record
    $sql = "DELETE FROM ad WHERE id=$delete_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data from the 'ad' table
$sql = "SELECT * FROM ad";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Discounts</title>
    <!-- Add any CSS or JavaScript links here -->
</head>
<body>

    <h2>List of Discounts</h2>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Sale</th>
                <th>Countdown Days</th>
                <th>Countdown Hours</th>
                <th>Countdown Minutes</th>
                <th>Countdown Seconds</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td><img src='" . $row["discount_img"] . "' alt='Discount Image' style='width: 100px; height: auto;'></td>";
                    echo "<td>" . $row["discount_title"] . "</td>";
                    echo "<td>" . $row["discount_sale"] . "</td>";
                    echo "<td>" . $row["countdown_days"] . "</td>";
                    echo "<td>" . $row["countdown_hours"] . "</td>";
                    echo "<td>" . $row["countdown_minutes"] . "</td>";
                    echo "<td>" . $row["countdown_seconds"] . "</td>";
                    echo "<td><a href='?delete_id=" . $row["id"] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>0 results</td></tr>";
            }
            ?>
        </tbody>
    </table>

<?php
// Close the database connection
$conn->close();
?>

</body>
</html>




    <section class="discount-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Enter Discount Details</h2>
                    <form enctype="multipart/form-data" method="POST">
                        <label for="discount_img">Image:</label>
                        <input type="file" name="discount_img" id="discount_img" required accept="image/jpeg, image/png, image/gif">
                        <label for="discount_title">Discount Title:</label>
                        <input type="text" name="discount_title" id="discount_title" required>
                        <label for="discount_sale">Discount Sale:</label>
                        <input type="text" name="discount_sale" id="discount_sale" required>
                        <label for="countdown_days">Countdown Days:</label>
                        <input type="number" name="countdown_days" id="countdown_days" required>
                        <label for="countdown_hours">Countdown Hours:</label>
                        <input type="number" name="countdown_hours" id="countdown_hours" required>
                        <label for="countdown_minutes">Countdown Minutes:</label>
                        <input type="number" name="countdown_minutes" id="countdown_minutes" required>
                        <label for="countdown_seconds">Countdown Seconds:</label>
                        <input type="number" name="countdown_seconds" id="countdown_seconds" required>
                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>
</html>


<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Retrieve form data if set
    $discount_title = isset($_POST['discount_title']) ? $_POST['discount_title'] : "";
    $discount_sale = isset($_POST['discount_sale']) ? $_POST['discount_sale'] : "";
    $countdown_days = isset($_POST['countdown_days']) ? $_POST['countdown_days'] : "";
    $countdown_hours = isset($_POST['countdown_hours']) ? $_POST['countdown_hours'] : "";
    $countdown_minutes = isset($_POST['countdown_minutes']) ? $_POST['countdown_minutes'] : "";
    $countdown_seconds = isset($_POST['countdown_seconds']) ? $_POST['countdown_seconds'] : "";

    // File upload handling
    $image = $_FILES['discount_img']['name']; // Get the original file name
    $image_tmp = $_FILES['discount_img']['tmp_name']; // Get the temporary file name

    // Define the target directory and file name
    $target_dir = "./assets/discount/";
    $target_file = $target_dir . basename($image); // Construct the target file path

    // Check file extension
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $allowedExtensions)) {
        // Move the uploaded file to the target directory with the desired file name
        if (move_uploaded_file($image_tmp, $target_file)) {
            // Insert form data into the database
            $sql = "INSERT INTO ad (discount_img, discount_title, discount_sale, countdown_days, countdown_hours, countdown_minutes, countdown_seconds) VALUES ('$target_file', '$discount_title', '$discount_sale', '$countdown_days', '$countdown_hours', '$countdown_minutes', '$countdown_seconds')";

            if ($conn->query($sql) === TRUE) {
                echo "Discount details saved successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
    }

    $conn->close();
}
?>


<?php 
include('footer.php');
?>