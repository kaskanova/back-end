<?php
$hour = (int) strftime('%H');
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
echo $welcome;

// Установка локали и выбор значений даты
setlocale(LC_ALL, "english"); //сменила язык
$day = strftime('%d');
$mon = strftime('%B');
$year = strftime('%Y');
?>

<blockquote>
<?php echo 'Today is ', $day, 'th ', $mon,', ', $year, ' year.'; ?> <!-- Пришлось поменять язык, на русском выходила ошибка -->
</blockquote>


