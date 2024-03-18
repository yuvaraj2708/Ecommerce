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

// Assuming your users table has columns like user_id, username, email, etc.
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die("Error in query: " . mysqli_error($conn));
}
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
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
<br>
<br>
    <h2 style="text-align:center">User Details</h2>

    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                // Add more columns as needed
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>

<?php
include('footer.php');
?>