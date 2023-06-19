<?php
session_start();
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With");

require '../connect.php';
include '../function.php';

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);
    
    if (!empty($input)) {
        $input = inputData($input);
    } else {
        $input = inputData($_POST);
    }
    
    $mail_template_code = $input['mail_template_code'];
    $content = $input['content'];

    $check_duplicate_sql = "SELECT COUNT(*) as count FROM template_mail WHERE mail_template_code = '$mail_template_code'";
    $result_duplicate = $conn->query($check_duplicate_sql);
    $row = mysqli_fetch_assoc($result_duplicate);
    $count = $row['count'];

    if ($count > 0) {
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error'
        ];

        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
        exit();
    }

    try {
        $sql = "INSERT INTO template_mail (mail_template_code, content) VALUES ('$mail_template_code', '$content')";

        if ($conn->query($sql) === TRUE) {
            $templateId = $conn->insert_id;
            $result = $conn->query("SELECT * FROM template_mail WHERE id = $templateId");
            $template = $result->fetch_assoc();

            $data = [
                'status' => 201,
                'message' => 'Created successfully tempalte',
                'data' => $template
            ];
            header("HTTP/1.0 201 Created successfully tempalte");
            echo json_encode($data);
            exit();
        } else {
            $data = [
                'status' => 500,
                'message' => 'Internal Server Error'
            ];
            header("HTTP/1.0 500 Internal Server Error");
            echo json_encode($data);
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        $data = [
            'status' => 500,
            'message' => $e->getMessage()
        ];
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
        exit();
    }

    $conn->close();
} else {
    $data = [
        'status' => 405,
        'message' => 'Method Not Allowed'
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
    exit();
}
?>