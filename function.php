<?php
function inputData($input) {
    $mail_template_code = $input['mail_template_code'];
    $content = $input['content'];

    if (empty(trim($mail_template_code))) {
        $data = [
            'status' => 400,
            'message' => 'mail_template_code cannot be empty'
        ];
        header("HTTP/1.0 400 mail_template_code cannot be empty");
        echo json_encode($data);
        exit();
    } elseif(empty(trim($content))) {
        $data = [
            'status' => 400,
            'message' => 'content cannot be empty'
        ];
        header("HTTP/1.0 400 content cannot be empty");
        echo json_encode($data);
        exit();
    } else {
        return $input;
    }
}
?>