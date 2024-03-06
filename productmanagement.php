<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <!-- Add your CSS styles or link to a stylesheet here -->
    <style>
        /* Add your styles here */
    </style>
</head>
<body>
    <!-- Navigation Menu -->
    <nav>
        <ul>
            <li><a href="usermanagement.php">User Management</a></li>
            <li><a href="ordermanagement.php">Order Management</a></li>
            <li><a href="productmanagement.php">Products Management</a></li>
            <li><a href="analytics.php">Analytics</a></li>
            <!-- Add more navigation items as needed -->
        </ul>
    </nav>

    <!-- Add New Product Form -->
    <section>
        <h2>Add New Product</h2>
        <form method="post" enctype="multipart/form-data">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" required>
            <label for="description">Description:</label>
            <textarea name="description" required></textarea>
            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" required>
            <label for="stock_quantity">Stock Quantity:</label>
            <input type="number" name="stock_quantity" required>
            <label for="category">Category:</label>
            <input type="text" name="category">
            <label for="image">Image:</label>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit">Add Product</button>
        </form>

        <?php
        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process other form fields

            // Process image upload
            $targetFolder = "uploads/";
            $targetPath = $targetFolder . basename($_FILES["image"]["name"]);

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath)) {
                // Image upload successful
                $imagePath = $targetPath;

                // Insert the new product into the database
                // Replace this with your actual database logic
                $productName = $_POST['product_name'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $stockQuantity = $_POST['stock_quantity'];
                $category = $_POST['category'];

                // Use prepared statements to prevent SQL injection
              // Use prepared statements to prevent SQL injection
                $conn = new mysqli("localhost", "root", "", "ecommerce");
                $stmt = $conn->prepare("INSERT INTO products (product_name, description, price, stock_quantity, category, image_path) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssdiss", $productName, $description, $price, $stockQuantity, $category, $imagePath);
                
                if ($stmt->execute()) {
                    echo '<p>New product added successfully!</p>';
                } else {
                    echo '<p>Error adding product.</p>';
                }
                
                $stmt->close();
                $conn->close();


                
            } else {
                echo '<p>Image upload failed.</p>';
            }
        }
        ?>
    </section>

    <!-- Add your footer with links and other information -->
    <footer>
        <p>&copy; 2024 Your E-Commerce Website. All rights reserved.</p>
    </footer>
</body>
</html>
