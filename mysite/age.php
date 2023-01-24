<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 3</title>
</head>
<body>
    <?
    session_start();
    include ('save.php');
    ?>

    <form method="post">
        <input type="text" class="form-control" placeholder="Please enter your age..." name="age">
        <input type="submit" class="btn btn-outline-success" value="SEND">
    </form>
    <a href="out.php"><button class="btn btn-success">next page -></button></a>

    <?
    $age = $_POST['age'];
    $_SESSION['age'] = $age;
    ?>
</body>
</html>