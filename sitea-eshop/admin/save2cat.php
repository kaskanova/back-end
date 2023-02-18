<?php
//РНР-код обработки HTML-формы

	// подключение библиотек
	require_once "../inc/lib.inc.php";
	require_once "secure/session.inc.php";
	require_once "../inc/config.inc.php";
	

	if($_SERVER['REQUEST_METHOD'] === "POST"){
		if(isset($_POST)) {
        	$title = $_POST['title'];
        	$author = $_POST['author'];
        	$pubyear = $_POST['pubyear'];
        	$price = $_POST['price'];
    	}
	}

	if(!addItemToCatalog($title, $author, $pubyear, $price)) {
		echo 'Произошла ошибка при добавлении товара в каталог';
	}else{
		header("Location: add2cat.php");
		exit;
	}
?>