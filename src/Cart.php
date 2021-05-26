<?php

Class Cart {
  public function output($input) {
    $lines = explode(PHP_EOL, $input);

    $currencies = array(
      array('EUR', 1),
      array('USD', 1.14),
      array('GBP', 0.88)
    );

    $output = "";
    $cart = array();

    foreach ($lines as &$line) {
      $line = explode(";", $line);

      if ($line[2] > -1) {
        array_push($cart, $line);
        $output .= $line[1] . " has been added to cart.\n";
      } else {
        foreach($cart as $key => $cartline) {
          if($line[0] == $cartline[0]) {
            unset($cart[$key]);
            $output .= $line[1] . " has been removed from cart.\n";
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

      $output .= "Total has been updated to " . number_format(round($total, 2), 2)." EUR\n";
      // var_dump($cart);
    }

    return $output;
  }
}