<?php

$input = fopen("input.txt", "r") or die("Unable to open file!");
$inputcontents = fread($input,filesize("input.txt"));

$lines = explode(PHP_EOL, $inputcontents);

$currencies = array(
  array('EUR', 1),
  array('USD', 1.14),
  array('GBP', 0.88)
);

$cart = array();

foreach ($lines as &$line) {
  $line = explode(";", $line);

  if ($line[2] > -1) {
    array_push($cart, $line);
  } else {
    foreach($cart as $key => $cartline) {
      if($line[0] == $cartline[0]) {
        unset($cart[$key]);
      }
    }
  }

  $total = 0;

  foreach($cart as $line) {
    foreach ($currencies as $currency) {
      if($line[4] == $currency[0]) {
        $total = $total + $line[2] * $line[3] / $currency[1];
      }
    }
  }

  echo(number_format(round($total, 2), 2)."\n");
  // var_dump($cart);
}

// var_dump($lines);
?>
