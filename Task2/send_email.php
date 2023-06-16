<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];

    if (empty($email)) {
        $emailErr = "Email khong duoc de trong";
        header("Location: ../index.php?emailErr=" . urlencode($emailErr));
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        header("Location: ../index.php?emailErr=" . urlencode($emailErr));
        exit();
    } else {
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '66399190610b90';
            $mail->Password = 'ca3ac90ad2024a';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            $mail->isHTML(true);
            $mail->addAddress($email);
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'Test send email <b>in bold!</b>';

            $mail->send();
            echo 'Email sent successfully';
        } catch (Exception $e) {
            echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
        }
    }
}
?>