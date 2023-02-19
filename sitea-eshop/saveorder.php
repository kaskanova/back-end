<?php
	require_once "inc/lib.inc.php";
	require_once "inc/config.inc.php";

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$orderid = uniqid();
	$datetime = time();
	$order = "'$name'|'$email'|'$phone'|'$address'|'$orderid'|'$datetime'";
	$order_array = [$order];
	foreach($order_array as $orders) {
		file_put_contents(ORDERS_LOG, $orders . PHP_EOL, FILE_APPEND);
	}
	saveOrder($datetime);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Сохранение данных заказа</title>
</head>
<body>
	<p>Ваш заказ принят.</p>
	<p><a href="catalog.php">Вернуться в каталог товаров</a></p>
</body>
</html>