<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        $errMsg = 'Заполните все поля формы!';
    } else {
        $title = trim($_POST['title']);
        $category = trim($_POST['category']);
        $description = trim($_POST['description']);
        $source = trim($_POST['source']);
    
        $news = new NewsDB();
    
        if ($news->saveNews($title, $category, $description, $source, $dt)) {
            header('Location: news.php');
            exit;
        } else {
            $errMsg = 'Произошла ошибка при добавлении новости';
        }
    }
?>