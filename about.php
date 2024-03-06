<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Add your CSS styles or link to a stylesheet here -->
    <style>
        /* Add your styles here */
    </style>
</head>
<body>
    <!-- Navigation Menu -->
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
            <!-- Add more navigation items as needed -->
        </ul>
    </nav>

    <!-- About Us Content -->
    <section>
        <h2>About Us</h2>

        <!-- Company History -->
        <div>
            <h3>Company History</h3>
            <?php
            // Add your company history content here
            echo '<p>Your company history goes here. Provide information about when your company was founded, key milestones, etc.</p>';
            ?>
        </div>

        <!-- Mission and Values -->
        <div>
            <h3>Mission and Values</h3>
            <?php
            // Add your mission and values content here
            echo '<p>Our mission is to... (insert your mission statement here)</p>';
            echo '<p>Our values include... (list your core values here)</p>';
            ?>
        </div>

        <!-- Team Members -->
        <div>
            <h3>Team Members</h3>
            <?php
            // Sample team members - Replace with actual data from your database
            $teamMembers = [
                ['name' => 'John Doe', 'position' => 'CEO', 'bio' => 'John Doe is the founder and CEO of our company. He has a passion for...'],
                ['name' => 'Jane Smith', 'position' => 'CTO', 'bio' => 'Jane Smith is the Chief Technology Officer. With a background in...'],
                // Add more team members as needed
            ];

            foreach ($teamMembers as $member) {
                echo '<div class="team-member">';
                echo '<h4>' . $member['name'] . ' - ' . $member['position'] . '</h4>';
                echo '<p>' . $member['bio'] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <!-- Add your footer with links and other information -->
    <footer>
        <p>&copy; 2024 Your E-Commerce Website. All rights reserved.</p>
    </footer>
</body>
</html>
