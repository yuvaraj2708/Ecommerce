<?php
session_start();

// Check if user is logged in and is a staff member
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'staff') {
    // If not logged in as staff, redirect to login page
    header("Location: login.php");
    exit(); // Make sure to exit after redirection
}

// If logged in as staff, continue displaying the dashboard content
?>

<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'rahman';

// Establish a connection to the database
$conn = mysqli_connect($host, $user, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle Add/Edit/Delete actions if submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_product'])) {
        // Handle adding a new product
        $brand = $_POST['brand'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $productcount = $_POST['productcount'];
    
        // File upload handling
        $image = $_FILES['image']['name']; // Get the original file name
        $image_tmp = $_FILES['image']['tmp_name']; // Get the temporary file name
    
        // Define the target directory and file name
        $target_dir = "./assets/products/";
        $target_file = $target_dir . basename($image); // Construct the target file path
    
        // Move the uploaded file to the target directory with the desired file name
        move_uploaded_file($image_tmp, $target_file);
    
        // Insert the product into the database with the file path
        mysqli_query($conn, "INSERT INTO product (item_brand, item_name, item_price, item_image, productcount) VALUES ('$brand', '$name', '$price', '$target_file', '$productcount')");
    }
    
    if (isset($_POST['edit_product'])) {
        // Handle editing an existing product
        $id = $_POST['id'];
        $brand = $_POST['brand'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_FILES['image']['name']; // Use $_FILES instead of $_POST for file uploads
        $productcount = $_POST['productcount'];
        
        // Check if a new image is uploaded
        if (!empty($image)) {
            // Define the target directory to save uploaded files
            $target_dir = "./assets/products/";
            // Construct the target file path with the desired file name
            $target_file = $target_dir . basename($image);
            // Move the uploaded file to the target directory with the desired file name
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            // Update the product image file path in the database
            mysqli_query($conn, "UPDATE product SET item_image = '$target_file' WHERE item_id = '$id'");
        }
    
        // Update other product details in the database
        mysqli_query($conn, "UPDATE product SET item_brand = '$brand', item_name = '$name', item_price = '$price', productcount = '$productcount' WHERE item_id = '$id'");
    }
    
    if (isset($_POST['delete_product'])) {
        // Handle deleting a product
        $id = $_POST['id'];
        mysqli_query($conn, "DELETE FROM product WHERE item_id = $id");
    }
    
    // Redirect back to the product listing
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Fetch products from the database
$result = mysqli_query($conn, "SELECT * FROM product");
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<?php 
ob_start();
include('staffheader.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h1, h2 {
            text-align: center;
        }

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

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 50px;
            max-height: 50px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .confirmation {
            margin-top: 20px;
            color: green;
        }

        .error {
            margin-top: 20px;
            color: red;
        }
    </style>
</head>
<body>

<h1>Product Management Dashboard</h1>

<!-- Product Listing -->
<h2>Product List</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Brand</th>
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>Product Count</th>
        <th>Register Date</th>
        <th>Action</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['item_id']; ?></td>
            <td><?= $product['item_brand']; ?></td>
            <td><?= $product['item_name']; ?></td>
            <td><?= $product['item_price']; ?></td>
            <td><img src="<?= $product['item_image']; ?>" alt="Product Image"></td>
            <td><?= $product['productcount']; ?></td>
            <td><?= $product['item_register']; ?></td>
            <td>
                <a href="?edit_id=<?= $product['item_id']; ?>">Edit</a>
                <a href="?delete_id=<?= $product['item_id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<br>
<!-- Add Product Section -->
<div class="card add-product-card">
    <div class="card-body">
        <h2 class="card-title">Add Product</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" name="brand" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="image">Image URL:</label>
                <input type="file" name="image" class="form-control-file" required>
            </div>
            <div class="form-group">
                <label for="productcount">Product Count:</label>
                <input type="text" name="productcount" class="form-control" required>
            </div>
            <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
        </form>

<?php if (isset($_GET['edit_id'])): ?>
    <?php
    $edit_id = $_GET['edit_id'];
    $result = mysqli_query($conn, "SELECT * FROM product WHERE item_id = $edit_id");
    $product = mysqli_fetch_assoc($result);
    ?>
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product['item_id']; ?>">
        
        <label for="brand">Brand:</label>
        <input type="text" name="brand" value="<?= $product['item_brand']; ?>" required><br>

        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $product['item_name']; ?>" required><br>

        <label for="price">Price:</label>
        <input type="number" name="price" value="<?= $product['item_price']; ?>" required><br>

        <label for="image">Image:</label>
        <input type="file" name="image">
        <img src="<?= $product['item_image']; ?>" alt="Product Image"><br>

        <label for="productcount">Product Count:</label>
        <input type="number" name="productcount" value="<?= $product['productcount']; ?>" required><br>

        <input type="submit" name="edit_product" value="Edit Product">
    </form>
<?php endif; ?>


<?php if (isset($_GET['delete_id'])): ?>
    <?php
    $delete_id = $_GET['delete_id'];
    $result = mysqli_query($conn, "SELECT * FROM product WHERE item_id = $delete_id");
    $product = mysqli_fetch_assoc($result);
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $product['item_id']; ?>">
        Are you sure you want to delete this product?<br>
        <!-- ... (same as before) -->
        <input type="submit" name="delete_product" value="Delete Product">
    </form>
<?php endif; ?>

</body>
</html>

<?php 

include('footer.php');

?>