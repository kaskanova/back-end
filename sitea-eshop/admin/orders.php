<?php
	require "secure/session.inc.php";
	require "../inc/lib.inc.php";
	require "../inc/config.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Поступившие заказы</title>
	<meta charset="utf-8">
</head>
<body>
<h1>Поступившие заказы:</h1>
<?php
	$orders = getOrders();
	$i=1;
	$sum=0;
	foreach($orders as $order):
?>
<hr>
<h2>Заказ номер: <?= $orderid ?> </h2>
<p><b>Заказчик</b>: <?= $order["name"] ?></p>
<p><b>Email</b>: <?= $order["email"] ?> </p>
<p><b>Телефон</b>: <?= $order["phone"] ?> </p>
<p><b>Адрес доставки</b>: <?= $order["address"] ?> </p>
<p><b>Дата размещения заказа</b>: <?= date_create('dd-mm-yyyy'); time('hh:mm') ?> </p>
<?php
	$i++;
	$sum += $item['price'] * $item['quantity'];
	endforeach;
?>

<h3>Купленные товары:</h3>
<table border="1" cellpadding="5" cellspacing="0" width="90%">
<tr>
	<th>N п/п</th>
	<th>Название</th>
	<th>Автор</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>Количество</th>
</tr>


</table>
<p>Всего товаров в заказе на сумму: руб.</p>

</body>
</html>