<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'yuvaraj.margy@gmail.com';
    $mail->Password = 'jgfq sjgh wxfq dtng'; // Replace with your Gmail account password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('yuvaraj.margy@gmail.com');
    $mail->addAddress('yuvaraj.margy@gmail.com'); // Set the "To" address

    $mail->isHTML(true);

    // Include email field in the body of the email
    $mail->Subject = $_POST["position"];
    $mail->Body = "Email Address: " . $_POST["email"] . "<br><br>" . "Name" . $_POST["name"] ."<br><br>" ."phone" . $_POST["phone"]  ."<br><br>".  "position" . $_POST["position"] ."<br><br>". $_POST["message"];

    $mail->send();

    echo "
    <script>
    alert('Sent Successfully');
    document.location.href = 'contact.php';
    </script>
    ";
}
?>
