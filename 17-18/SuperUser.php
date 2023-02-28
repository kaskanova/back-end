<?php
    class SuperUser extends User implements ISuperUser, IAuthorizeUser  {
        public $role;
        public static $counter = 0;

        public function __construct($name, $login, $pass, $role){
            $this->role = $role;
            echo (static::$counter );
    
            parent :: __construct($name, $login, $pass);
        }

        function getInfo() {
            return get_object_vars($this);
        }

        function auth($login, $password) {
            if ($login == $this->login && $password == $this->password) {
                echo "Аутентификация прошла успешно <br>";
            } else {
                echo "Аутентификация провалилась | Миссия невыполнима <br>";
            }
        }
    }
?>