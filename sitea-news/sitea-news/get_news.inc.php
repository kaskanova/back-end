<?php
require_once('INewsDB.class.php');
require_once('NewsDB.class.php');

$db = new NewsDB();

$result = $db->getNews();

if (!$result) {
    $errMsg = "Произошла ошибка при выводе новостной ленты";
} else {
    $count = count($result);
    echo "<p>Новостей: $count</p>";

    foreach ($result as $row) {
        $id = $row['id'];
        $title = $row['title'];
        $category = $row['category'];
        $description = $row['description'];
        $source = $row['source'];
        $dt = $row['datetime'];

        $link = "news.php?id=$id";

        echo "<h2><a href='$link'>$title</a></h2>";
        echo "<p>Категория: $category</p>";
        echo "<p>Текст новости: $description</p>";
        echo "<p>Источник: $source</p>";
        echo "<p>Дата публикации: $dt</p>";
    }
}