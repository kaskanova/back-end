<?
$visitCounter = 0;
$lastVisit = "";

if(isset($_COOKIE["visitCounter"])) {
  $visitCounter = (int)$_COOKIE["visitCounter"];
  $visitCounter++;
  setcookie("visitCounter", $visitCounter, time() + (86400 * 30));
  echo "Вы зашли к нам " . $visitCounter . " раз" . "<br>";
}else{
    setcookie("visitCounter", 1, time() + (86400 * 30));
    echo "Спасибо, что зашли на огонек";
}

if(isset($_COOKIE['lastVisit'])) {
    $lastVisit = date("F j, Y, g:i:s", $_COOKIE['lastVisit']);
    setcookie("lastVisit", time(), time() + (86400 * 30));
    echo "Последнее посещение: " . $lastVisit;
}else{
    setcookie("lastVisit", time(), time() + (86400 * 30));
    echo "Это ваш первый визит";
}

if(date('d-m-Y', $_COOKIE['lastVisit']) != date('d-m-Y'))
?>