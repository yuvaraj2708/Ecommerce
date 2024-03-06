<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - User Management</title>
    <!-- Add your CSS styles or link to a stylesheet here -->
    <style>
        /* Add your styles here */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecommerce";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>

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
    <!-- Admin Dashboard Content - User Management -->
    <section>
        <h2>Admin Dashboard - User Management</h2>

        <!-- View All Users -->
        <div>
            <h3>View All Users</h3>
            <?php
            // Fetch real user data from the database
            $allUsersQuery = "SELECT * FROM users";
            $allUsersResult = $conn->query($allUsersQuery);

            echo '<table>';
            echo '<tr><th>ID</th><th>Username</th><th>Email</th><th>phone</th><th>Action</th></tr>';

            while ($user = $allUsersResult->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $user['id'] . '</td>';
                echo '<td>' . $user['username'] . '</td>';
                echo '<td>' . $user['email'] . '</td>';
                echo '<td>' . $user['phone'] . '</td>';
                echo '<td><a href="user_details.php?id=' . $user['id'] . '">Details</a> | <a href="disable_user.php?id=' . $user['id'] . '">Disable</a></td>';
                echo '</tr>';
            }

            echo '</table>';
            ?>
        </div>

        <!-- User Details -->
        <div>
            <h3>User Details</h3>
            <?php
            // Fetch user details based on the ID parameter in the URL
            $userId = isset($_GET['id']) ? $_GET['id'] : null;

            if ($userId) {
                $userDetailsQuery = "SELECT * FROM users WHERE id = $userId";
                $userDetailsResult = $conn->query($userDetailsQuery);

                if ($userDetailsResult->num_rows > 0) {
                    $userDetails = $userDetailsResult->fetch_assoc();

                    echo '<p>ID: ' . $userDetails['id'] . '</p>';
                    echo '<p>Username: ' . $userDetails['username'] . '</p>';
                    echo '<p>Email: ' . $userDetails['email'] . '</p>';
                    echo '<p>Login History:</p>';

                    // Sample login history - Replace with actual data from your database
                    $loginHistoryQuery = "SELECT * FROM login_history WHERE user_id = $userId";
                    $loginHistoryResult = $conn->query($loginHistoryQuery);

                    echo '<ul>';
                    while ($login = $loginHistoryResult->fetch_assoc()) {
                        echo '<li>' . $login['login_date'] . ' ' . $login['login_time'] . '</li>';
                    }
                    echo '</ul>';
                } else {
                    echo '<p>No user details found.</p>';
                }
            } else {
                echo '<p>No user ID specified.</p>';
            }
            ?>
        </div>

        <!-- Disable/Enable User Accounts -->
        <div>
            <h3>Disable/Enable User Accounts</h3>
            <?php
            // Fetch real disabled user data from the database
            $disabledUsersQuery = "SELECT * FROM users WHERE phone = 'Disabled'";
            $disabledUsersResult = $conn->query($disabledUsersQuery);

            echo '<table>';
            echo '<tr><th>ID</th><th>Username</th><th>Email</th><th>phone</th><th>Action</th></tr>';

            while ($disabledUser = $disabledUsersResult->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $disabledUser['id'] . '</td>';
                echo '<td>' . $disabledUser['username'] . '</td>';
                echo '<td>' . $disabledUser['email'] . '</td>';
                echo '<td>' . $disabledUser['phone'] . '</td>';
                echo '<td><a href="enable_user.php?id=' . $disabledUser['id'] . '">Enable</a></td>';
                echo '</tr>';
            }

            echo '</table>';
            ?>
        </div>
    </section>

    <!-- Add your footer with links and other information -->
    <footer>
        <p>&copy; 2024 Your E-Commerce Website. All rights reserved.</p>
    </footer>

    <?php
    // Close the database connection at the end of the file
    $conn->close();
    ?>
</body>
</html>
