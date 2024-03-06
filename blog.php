<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
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
            <li><a href="#">Blog</a></li>
            <!-- Add more navigation items as needed -->
        </ul>
    </nav>

    <!-- Blog Content -->
    <section>
        <h2>Featured Articles</h2>
        <?php
        // Sample featured articles - Replace with actual data from your database
        $featuredArticles = [
            ['title' => '10 Tips for Productivity', 'category' => 'Productivity', 'date' => '2024-03-05', 'author' => 'John Doe'],
            ['title' => 'The Latest Trends in Technology', 'category' => 'Technology', 'date' => '2024-03-01', 'author' => 'Jane Smith'],
            // Add more featured articles as needed
        ];

        foreach ($featuredArticles as $article) {
            echo '<div class="blog-post">';
            echo '<h3>' . $article['title'] . '</h3>';
            echo '<p>Category: ' . $article['category'] . '</p>';
            echo '<p>Date: ' . $article['date'] . '</p>';
            echo '<p>Author: ' . $article['author'] . '</p>';
            echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et felis ligula...</p>';
            echo '<a href="#">Read more</a>';
            echo '</div>';
        }
        ?>

        <!-- Categories -->
        <div>
            <h2>Categories</h2>
            <?php
            // Sample categories - Replace with actual data from your database
            $categories = ['Productivity', 'Technology', 'Health', 'Travel', 'Fashion'];

            foreach ($categories as $category) {
                echo '<a href="#">' . $category . '</a>';
            }
            ?>
        </div>

        <!-- Search Bar -->
        <div>
            <h2>Search Bar</h2>
            <form method="get" action="search.php">
                <input type="text" name="query" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </div>
    </section>

    <!-- Add your footer with links and other information -->
    <footer>
        <p>&copy; 2024 Your E-Commerce Website. All rights reserved.</p>
    </footer>
</body>
</html>
