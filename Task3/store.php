<?php
session_start();
require '../connect.php';

if (empty($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
    header("Location: ../form_login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_SESSION['user']['role'] == 1)) {
    $mail_template_code = $_POST['mail_template_code'];

    $check_duplicate_sql = "SELECT COUNT(*) as count FROM template_mail WHERE mail_template_code = '$mail_template_code'";
    $result_duplicate = $conn->query($check_duplicate_sql);
    $row = mysqli_fetch_assoc($result_duplicate);
    $count = $row['count'];

    if ($count != 0) {
        echo "Lỗi: Mã template email đã tồn tại. Vui lòng nhập một mã khác.";
        return;
    }

    $content = $_POST['content'];

    try {
        $sql = "INSERT INTO template_mail (mail_template_code, content) VALUES ('$mail_template_code', '$content')";

        if ($conn->query($sql) === TRUE) {
            $templateId = $conn->insert_id;
            $result = $conn->query("SELECT * FROM template_mail WHERE id = $templateId");
            $template = $result->fetch_assoc();
    
            header('Content-Type: application/json');
            echo json_encode($template);
        } else {
            echo 'Lỗi khi thêm mới template: ' . $conn->error;
        }
    } catch (mysqli_sql_exception $e) {
        echo "Lỗi: " . $e->getMessage();
    }

    $conn->close();
} else {
    echo "Ban can dang nhap quyen admin";
}
?>