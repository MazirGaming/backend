<?php
error_reporting(0);

function inputData($input) {
    if(empty($input)) {
        $data = [
            'status' => 404,
            'message' => 'Server Not Found'
        ];
        header("HTTP/1.0 404 Server Not Found");
        echo json_encode($data);
        exit();
    }

    if (empty(trim($input['mail_template_code']))) {
        $data = [
            'status' => 400,
            'message' => 'mail_template_code cannot be empty'
        ];
        header("HTTP/1.0 400 mail_template_code cannot be empty");
        echo json_encode($data);
        exit();
    } elseif(empty(trim($input['content']))) {
        $data = [
            'status' => 400,
            'message' => 'content cannot be empty'
        ];
        header("HTTP/1.0 400 content cannot be empty");
        echo json_encode($data);
        exit();
    } else {
        $mail_template_code = $input['mail_template_code'];
        $content = $input['content'];

        return $input;
    }
}


function authenticate() {
    if (empty($_SESSION['user'])) {
        $response = [
            'status' => 500,
            'message' => 'You need to login'
        ];

        header("HTTP/1.0 500 You need to login");
        echo json_encode($response);
        exit();
    }

    if ($_SESSION['user']['role'] != 1) {
        $response = [
            'status' => 500,
            'message' => 'You need to login with admin role'
        ];

        header("HTTP/1.0 500 You need to login with admin role");
        echo json_encode($response);
        exit();
    }
}
?>