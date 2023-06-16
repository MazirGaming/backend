<?php
session_start();
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($password == $user['password']) {
            $_SESSION['user'] = $user;
            if ($user['role'] == 1) {
                header("Location: admin.php");
                exit();
            } else {
                echo json_encode("Bạn là user, chào mừng bạn đến với website");
            }
        } else {
            echo "Sai mật khẩu.";
        }
    } else {
        echo "Người dùng không tồn tại.";
    }
}
?>

