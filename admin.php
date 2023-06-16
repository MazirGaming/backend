<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
        }
        form div {
            width: 30%;
            margin: 12px 0;
            display: flex;
            flex-direction: column;
        }

        input {
            width: 100px;
        }
    </style>
</head>
<body>
    <h1>Tạo template mail</h1>
    <form action="Task3/store.php" method="post">
        <div>
            <label for="">mail code</label>
            <input type="text" name="mail_template_code">
        </div>
        <div>
            <label for="">content mail</label>
            <textarea name="content" id="" cols="30" rows="10"></textarea>
        </div>
        <input type="submit" value="Tạo mới">
    </form>
</body>
</html>