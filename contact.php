<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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

    <!-- Contact Us Content -->
    <section>
        <h2>Contact Us</h2>

        <!-- Contact Form -->
        <div>
            <h3>Contact Form</h3>
            <?php
            // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Process form data (you can add form validation and other processing logic)
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];

                // Example: Send an email (you may want to use a dedicated library for email sending)
                mail('contact@example.com', 'New Contact Form Submission', "Name: $name\nEmail: $email\nMessage: $message");

                echo '<p>Thank you for contacting us! We will get back to you soon.</p>';
            } else {
                // Display the contact form
                echo '<form method="post" action="contact.php">';
                echo '<label for="name">Name:</label>';
                echo '<input type="text" name="name" required>';
                echo '<label for="email">Email:</label>';
                echo '<input type="email" name="email" required>';
                echo '<label for="message">Message:</label>';
                echo '<textarea name="message" required></textarea>';
                echo '<button type="submit">Submit</button>';
                echo '</form>';
            }
            ?>
        </div>

        <!-- Customer Support Information -->
        <div>
            <h3>Customer Support Information</h3>
            <?php
            // Add your customer support contact details here
            echo '<p>Email: support@example.com</p>';
            echo '<p>Phone: +1 (555) 123-4567</p>';
            ?>
        </div>

        <!-- Physical Location (if applicable) -->
        <div>
            <h3>Physical Location</h3>
            <?php
            // Add your physical location information here
            echo '<p>Your Company Name</p>';
            echo '<p>123 Main Street</p>';
            echo '<p>City, State, Zip Code</p>';
            ?>
        </div>
    </section>

    <!-- Add your footer with links and other information -->
    <footer>
        <p>&copy; 2024 Your E-Commerce Website. All rights reserved.</p>
    </footer>
</body>
</html>
