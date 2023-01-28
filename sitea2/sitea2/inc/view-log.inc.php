<?
if (file_exists("path.log")) {
    $f = file("path.log");
    foreach($f as $value) {
        echo $value . "<br>";
    }
}
?>

