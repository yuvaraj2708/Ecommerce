<!-- staff_registration.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Registration</title>
</head>
<body>
    <h2>Staff Registration</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" required><br>
        <input type="hidden" name="role" value="staff">
        <input type="submit" name="register" value="Register as Staff">
    </form>
</body>
</html>

<!-- register.php -->
<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'rahman';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role']; // Get the role from the form submission

    if ($role === 'user') {
        $query = "INSERT INTO users (username, password, email, phone, role) VALUES ('$username', '$password', '$email', '$phone', 'user')";
    } elseif ($role === 'staff') {
        // Insert the role into the staff table
        $query = "INSERT INTO staff (username, password, email, phone, role) VALUES ('$username', '$password', '$email', '$phone', '$role')";
    }

    mysqli_query($conn, $query);
}

mysqli_close($conn);
?>

