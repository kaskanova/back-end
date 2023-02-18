<?php
	// подключение библиотек
	require_once "inc/config.inc.php";
	require_once "inc/lib.inc.php";

	$id = $_GET["id"];
	$count++;
	add2Basket($id);
	header("Location: http://localhost/sitea-eshop/catalog.php");
?>