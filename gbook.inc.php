<?php
/* Основные настройки */
const DB_HOST = "localhost";
const DB_LOGIN = "root";
const DB_PASSWORD = "";
const DB_NAME = "gbook";

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
if (!$link) {
    echo mysqli_connect_error($link);
    die();
}
/* Основные настройки */

/* Сохранение записи в БД */
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

$sql = "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')";
mysqli_query($link, $sql);



};


/* Сохранение записи в БД */

/* Удаление записи из БД */
if ($_SERVER['REQUEST_METHOD']=='GET') {
    $del = filter_input(INPUT_GET, 'del', FILTER_VALIDATE_INT);
}
/* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" name="submit" value="Отправить!" />

</form>
<?php
/* Вывод записей из БД */
$sql = "SELECT id, name, email, msg, UNIX_TIMESTAMP(datetime) as dt FROM msgs ORDER BY id DESC";
$result = mysqli_query($link, $sql);
mysqli_close($link);
$num_rows = mysqli_num_rows($result);

echo "<p> Всего записей в гостевой книге: $num_rows </p>";

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    $msg = $row['msg'];
    $dt = $row['dt'];

    echo "<p><a href='$email'>$name</a> $dt в 13:45 написал <br /> $msg</p>";
    echo "<p align='right'><a href='http://localhost/sitea2/index.php?id=gbook&del=$id'>Удалить</a></p>";
}
/* Вывод записей из БД */
?>