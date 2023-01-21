<?php
/* Обработка ошибок (сообщение об ошибке) */
const ERR_ON_DRAW_MENU = "<h1 style = 'background: red'>Error! Функция отрисовки меню не отработала</h1>"; 

  /* Menu */
$leftMenu = [
	['link'=>'Домой', 'href'=>'index.php'],
	['link'=>'О нас', 'href'=>'index.php?id=about'],
	['link'=>'Контакты', 'href'=>'index.php?id=contact'],
	['link'=>'Таблица умножения', 'href'=>'index.php?id=table'],
	['link'=>'Калькулятор', 'href'=>'index.php?id=calc'],
];

/* Установка локали и даты */
setlocale(LC_ALL, "english");  
$day = date('d'); 
$mon = date('M'); 
$year = date('Y');


/* Константа для футера */
const COPYRIGHT = "Супер Мега Веб-мастер"; // константа объявляется без знака доллара


/* Приветствие */
$hour = (int) date('%H'); // (int) - приводит строку в целое число
$welcome = '';

if ($hour > 0 && $hour < 6) {
$welcome = 'Доброй ночи';
}
elseif ($hour >= 6 && $hour < 12) {
    $welcome = 'Доброе утро';
}
elseif ($hour >= 12 && $hour < 18) {
    $welcome = 'Добрый день';
}
elseif ($hour >= 18 && $hour < 23) {
    $welcome = 'Добрый вечер';
}
else {
    $welcome = 'Доброй ночи';
}

?>