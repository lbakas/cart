<?php

require "vendor/autoload.php";

$file = fopen("input.txt", "r") or die("Unable to open file!");
$input = fread($file,filesize("input.txt"));

$cart = new Cart();

echo $cart->output($input);

?>
