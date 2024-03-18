<?php
// Establish the database connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'rahman';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Include the header file and pass the $conn variable
include('header.php');
?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <div class="career__content">
                <h2 class="section-title">Career Opportunities</h2>
                <p class="section-description">We're always looking for talented individuals to join our team. If you're passionate about technology and innovation, we'd love to hear from you!</p>

                <h3>Available Positions</h3><br>
                <ul class="position-list">
                    <li>Software Engineer</li><br>
                    <li>Web Developer</li><br>
                    <li>Data Scientist</li><br>
                    <li>Graphic Designer</li><br>
                    <li>Marketing Specialist</li><br>
                </ul>

                <h3>Why Join Us?</h3><br>
                <p>At our company, we foster a culture of creativity, collaboration, and continuous learning. We offer competitive salaries, comprehensive benefits packages, and opportunities for career growth and development.</p>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="contact__form">
                <h2 class="section-title">How to Apply</h2>
                <p class="section-description">If you're interested in any of the positions listed above or would like to explore other opportunities with us, please fill out the form below or email your resume to careers@example.com.</p>

                <form action="#" method="post" class="application-form">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <input type="text" name="position" placeholder="Position of Interest">
                    <textarea name="message" placeholder="Your Message"></textarea>
                    <button type="submit" class="site-btn">Submit Application</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>
