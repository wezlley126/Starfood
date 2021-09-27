<?php
  $arrays1 = array(
    array("nome1" => 1),
    array("nome2" => 2),
    array("nome3" => 3)
  );
  $arrays2 = array(
    array("nome4" => 4),
    array("nome5" => 5),
    array("nome6" => 6)
  );
  $arrays3 = array(
    array("nome5" => 5),
    array("nome6" => 6),
    array("nome7" => 7)
  );
  $arrays = array_merge($arrays1, $arrays2, $arrays3);
  foreach ($arrays as $nome => $array) {
    foreach ($array as $key => $value) {
      echo "$key => $value<br/>";
    }
  }
  foreach ($arrays3 as $nome => $array) {
    foreach ($array as $key => $value) {
      echo " $nome => $value ";
    }
  }
?>
