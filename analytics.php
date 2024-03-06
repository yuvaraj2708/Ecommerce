<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Analytics</title>
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

    <!-- Admin Dashboard Content - Analytics -->
    <section>
        <h2>Admin Dashboard - Analytics</h2>

        <!-- Sales Performance -->
        <div>
            <h3>Sales Performance</h3>
            <?php
            // Fetch monthly sales data from your database
            $monthlySales = []; // Replace this with your database query

            echo '<canvas id="salesChart" width="400" height="200"></canvas>';

            // JavaScript code for rendering the sales chart
            echo '<script>';
            echo 'var ctx = document.getElementById("salesChart").getContext("2d");';
            echo 'var salesChart = new Chart(ctx, {';
            echo 'type: "line",';
            echo 'data: {';
            echo 'labels: ' . json_encode(array_column($monthlySales, 'month')) . ',';
            echo 'datasets: [{';
            echo 'label: "Monthly Sales",';
            echo 'data: ' . json_encode(array_column($monthlySales, 'sales')) . ',';
            echo 'backgroundColor: "rgba(75, 192, 192, 0.2)",';
            echo 'borderColor: "rgba(75, 192, 192, 1)",';
            echo 'borderWidth: 1';
            echo '}]';
            echo '},';
            echo 'options: {';
            echo 'scales: {';
            echo 'y: {';
            echo 'beginAtZero: true';
            echo '}';
            echo '}';
            echo '}';
            echo '});';
            echo '</script>';
            ?>
        </div>

        <!-- Popular Products -->
        <div>
            <h3>Popular Products</h3>
            <?php
            // Fetch popular products data from your database
            $popularProducts = []; // Replace this with your database query

            echo '<ul>';
            foreach ($popularProducts as $product) {
                echo '<li>' . $product['product_name'] . ' - ' . $product['total_sales'] . ' total sales</li>';
            }
            echo '</ul>';
            ?>
        </div>

        <!-- User Activity -->
        <div>
            <h3>User Activity</h3>
            <?php
            // Fetch user activity data from your database
            $userActivity = []; // Replace this with your database query

            echo '<ul>';
            foreach ($userActivity as $user) {
                echo '<li>' . $user['username'] . ' - Last login: ' . $user['last_login'] . '</li>';
            }
            echo '</ul>';
            ?>
        </div>
    </section>

    <!-- Add your footer with links and other information -->
    <footer>
        <p>&copy; 2024 Your E-Commerce Website. All rights reserved.</p>
    </footer>
</body>
</html>
