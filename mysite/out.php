<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 4. Вывод данных</title>
</head>
<body>
    <?
    session_start();
    $pages = explode("|", $_SESSION["pages"]);
    if (is_array($pages))
        array_pop($pages);
    echo "<ol>";
    foreach ($pages as $page) {
        echo "<li>$page</li>";
    }
    echo "</ol>";
    print '</ol>';
    

    if (isset($_SESSION["name"]) && isset($_SESSION["age"])) {
        $name = $_SESSION["name"];
        $surname = $_SESSION["surname"];
        $age = $_SESSION["age"];
        echo "<br> Name: $name <br> Surname: $surname <br> Age: $age";
    }
    ?>
    
    <p class="lead">End of forms. Thank you!</p>
</body>
</html>