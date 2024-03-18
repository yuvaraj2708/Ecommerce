<!-- login.php -->
<?php
session_start();

// Check if user is already logged in
if (isset($_SESSION['id']) && isset($_SESSION['role'])) {
    // Redirect to index page
    header("Location: index.php");
    exit(); // Make sure to exit after redirection
}

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'rahman';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $queryUser = "SELECT * FROM users WHERE username='$username'";
    $queryStaff = "SELECT * FROM staff WHERE username='$username'";

    $resultUser = mysqli_query($conn, $queryUser);
    $resultStaff = mysqli_query($conn, $queryStaff);

    $user = mysqli_fetch_assoc($resultUser);
    $staff = mysqli_fetch_assoc($resultStaff);

    if ($user && password_verify($password, $user['password'])) {
        // Successful login for user
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = 'user';
        header("Location: index.php");
        exit();
    } elseif ($staff && password_verify($password, $staff['password'])) {
        // Successful login for staff
        $_SESSION['id'] = $staff['id'];
        $_SESSION['username'] = $staff['username'];
        $_SESSION['role'] = 'staff';
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid username or password";
    }
}

mysqli_close($conn);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 300px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required><br>
            <input type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>

<!-- login.php -->


