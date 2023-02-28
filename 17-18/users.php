<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

interface  IAuthorizeUser {
    function auth($login, $password);
}

$user1 = new User("Alikhan", "alikhh", "123");
    $user1->showInfo();
$user2 = new User("Dastan", "ddsyk", "456");
    $user2->showInfo();
$user3 = new User("Lesha", "lesh", "789");
    $user3->showInfo();


$user = new SuperUser("Adele", "adeleekas", "3421", "lol");
$user->showInfo();

print_r($user->getInfo());

print_r($user->auth('adeleekas', '3421'));

echo '<br>Всего обычных пользователей: ' . User :: $counter;
echo '<br>Всего супер-пользователей: ' . SuperUser :: $counter . '<br><br>';



?>