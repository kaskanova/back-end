<?php
    class User extends UserAbstract{
        public $name = '';
        public $login = '';
        public $password = '';
        public static $counter = 0;

        function __construct($name, $login, $password) {
            $this->name = $name;
            $this->login = $login;
            $this->password = $password;
            echo ( ++static::$counter );
        }

        function __destruct() {
            echo "Пользователь $this->login удален | ";
        }

        public function showInfo() {
            echo "Name: $this->name <br>";
            echo "Login: $this->login <br>";
            echo "Password: $this->password <br>";
        }
    }
?>