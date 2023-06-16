<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../connect.php';

if (empty($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    header("Location: ../form_login.php");
    exit();
}

if (!isset($_GET['mail_template_code'])) {
    die('Missing mail_template_code');
}

$mail_template_code = $_GET['mail_template_code'];

if (strlen($mail_template_code) > 100) {
    echo "Lỗi: Độ dài mã template email vượt quá giới hạn (100 ký tự).";
    return;
}

$result = $conn->query("SELECT * FROM template_mail WHERE mail_template_code = '$mail_template_code'");
$mail_template = $result->fetch_assoc();

require '../Task2/PHPMailer/src/Exception.php';
require '../Task2/PHPMailer/src/PHPMailer.php';
require '../Task2/PHPMailer/src/SMTP.php';

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
    $mail->setFrom('from@example.com', 'Mailer');
    $subject = 'Your subject';
    $mail->Subject = $subject;
    $mail->Body = $mail_template['content'];

    $users = array('user1@example.com', 'user2@example.com', 'user3@example.com');
    
    foreach ($users as $email) {
        $mail->addAddress($email);
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
        $mail->clearAddresses();
    }

    $conn->close();
} catch (Exception $e) {
    echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
}

$response = array('message' => 'Email sent to subscribed users');
echo json_encode($response);