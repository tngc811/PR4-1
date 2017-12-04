<?php
  $sei = $_POST['sei'];
  $age = $_POST['age'];
  $h_num = $_POST['h_num'];
  $volume = $_POST['volume'];
  $atm = $_POST['atm'];
  $score = $_POST['score'];
  $sum =$sei . $age . $h_num . $volume . $atm . $score;
  echo $sum;
 ?>
