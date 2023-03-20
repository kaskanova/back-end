<?php
require_once('NewsDB.class.php');

$news = new NewsDB();

$id = isset($_GET['id']) ? abs((int)$_GET['id']) : 0;

if (!$id) {
    echo 'Некорректный идентификатор новости';
    exit;
}

$article = $news->showNews($id);

if (!$article) {
    echo 'Произошла ошибка при получении данных новости';
    exit;
}

echo '<h1>'.$article['title'].'</h1>';
echo '<p>'.$article['description'].'</p>';
echo '<p><a href="'.$article['source'].'">Источник</a></p>';
echo '<p><em>'.$article['datetime'].'</em></p>';