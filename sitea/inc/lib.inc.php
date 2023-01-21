<?php
  $cols = 10;
  $rows = 10;
  $color = 'lightblue';

  function drawTable($cols, $rows, $color){
    echo "<table border='1'>\n";
        for ($tr = 1; $tr <= $rows; $tr++) {
          echo "<tr>";
          for ($td = 1; $td <= $cols; $td++) { 
            if ($tr == 1 || $td == 1) {echo "<th style = 'background : {$color}; text-align: center;'>" . $tr * $td . "</th>";}
            else {echo "<td>" . $tr * $td . "</td>";}
          }
          echo "</tr>";
        }
        echo "</table>";
  }
?>

<?php
  function drawMenu($menu, $vertical = true,) {

    if(!$vertical){
      $style = " style = 'display: inline; margin-right: 20px'";
    }
    foreach ($menu as $item) { 
      echo "<ul>";
        echo "<li>";
          echo "<a href='{$item['href']}'> {$item['link']} </a>"; 
        echo "</li>";
      echo "</ul>";
    }
  }
  
?>