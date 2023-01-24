<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page 1</title>
</head>
<body>
    <?php
    session_start();
    include ('save.php');
    ?>
    
    <form method="post">
        <input type="text" class="form-control" placeholder="Please write your name..." name="name">
        <input type="submit" class="btn btn-outline-success" value="SEND">
    </form>
    <a href="surname.php"><button class="btn btn-success">next page -></button></a>
    
    <?
    $name = $_POST ['name'];
    $_SESSION['name'] = $name;
    ?>
</body>
</html>