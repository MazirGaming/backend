<?php
session_start();
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../connect.php';

$mail_template_code = $_GET['mail_template_code'];

if (empty($mail_template_code)) {
    $data = [
        'status' => 400,
        'message' => 'mail_template_code cannot be empty'
    ];
    header("HTTP/1.0 400 mail_template_code cannot be empty");
    echo json_encode($data);
    exit();
}

if (empty($_SESSION['user'])) {
    $data = [
        'status' => 500,
        'message' => 'You need login'
    ];
    header("HTTP/1.0 500 You need login");
    echo json_encode($data);
    exit();
}

if ($_SESSION['user']['role'] != 1) {
    $data = [
        'status' => 500,
        'message' => 'You need login with role admin'
    ];
    header("HTTP/1.0 500 You need login with role admin");
    echo json_encode($data);
    exit();
}

if (strlen($mail_template_code) > 100) {
    $data = [
        'status' => 400,
        'message' => 'mail_template_code Exceeded allowed characters'
    ];
    header("HTTP/1.0 mail_template_code 400 Exceeded allowed characters");
    echo json_encode($data);
    exit();
}

$result = $conn->query("SELECT * FROM template_mail WHERE mail_template_code = '$mail_template_code'");
$mail_template = $result->fetch_assoc();

if ($mail_template) {
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
                $data = [
                    'status' => 500,
                    'message' => 'Internal Server Error'
                ];
        
                header("HTTP/1.0 500 Internal Server Error");
                echo json_encode($data);
                exit();
            }
            $mail->clearAddresses();
        }

        $data = [
            'status' => 200,
            'message' => 'Send Email Successfully'
        ];

        header("HTTP/1.0 200 Send Email Successfully");
        echo json_encode($data);
        exit();

        $conn->close();
    } catch (Exception $e) {
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];

        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
        exit();
    }
} else {
    $data = [
        'status' => 500,
        'message' => 'Internal Server Error'
    ];

    header("HTTP/1.0 500 Internal Server Error");
    echo json_encode($data);
    exit();
}

