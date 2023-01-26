<?php
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $comment = htmlspecialchars(($_POST['comment']));
    $time = date("d:m:Y H:1");

    $arr = [
        'name' => $name,
        'comment' => $comment,
        'date' => $time
    ];

    $json = json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    file_put_contents("date.json", $json, FILE_APPEND);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div>
        <form action="" method="post">
            <label for="name">Имя</label>
            <input type="text" name="name" placeholder="Enter your name" class="form-control">
            <br>
            <label for="comment">Коммент</label>
            <textarea name="comment" class="form-control" placeholder="Leave a comment here"></textarea>
            <br>
            <button name="submit" class="btn btn-primary btn-lg">Отправить</button>
        </form>
    </div>
    <style>
        div{
            width: 600px;
            margin: 20px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>