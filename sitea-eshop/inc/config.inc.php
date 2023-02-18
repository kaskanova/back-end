<?php
//основные настройки сайта
require_once('lib.inc.php');

const DB_HOST = "localhost";
const DB_LOGIN = "root";
const DB_PASSWORD = "";
const DB_NAME = "eshop";
const ORDERS_LOG = "C:\OSPanel\domains\localhost\sitea-eshop\admin\orders.log";

$basket = [];
$count = 0;

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
if (!$link) {
    echo mysqli_connect_error($link);
    die();
}

basketInit();
?>