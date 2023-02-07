<?
$link = mysqli_connect('localhost', 'root', '', 'kinotower');
if(!$link) {
    echo mysqli_connect_error($link);
    die();    
}
require_once "func.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $to_del = $_POST['delete'];
    echo $to_del;
    delete_category($link, (int)$to_del);
    $_POST = array();

}
echo "категория удалена";