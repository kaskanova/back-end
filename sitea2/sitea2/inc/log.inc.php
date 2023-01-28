<?
$dt = date("d-m-Y H:i:s");
$page = $_SERVER['REQUEST_URI'];
$ref = $_SERVER['HTTP_REFERER'];
$path = "$dt | $page | $ref \n";

$f = fopen(PATH_LOG, "a");
fputs($f, $path);
fclose($f);

?>
