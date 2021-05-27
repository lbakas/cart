<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . "/../src/Cart.php";

class CartTests extends TestCase
{
  public function testCart()
  {
    $cart = new Cart();
    $input = "mbp;Macbook Pro;2;29.99;EUR\r\n" .
      "zen;Asus Zenbook;3;99.99;USD\r\n" .
      "mbp;Macbook Pro;5;100.09;GBP\r\n" .
      "zen;Asus Zenbook;-1;;\r\n" .
      "len;Lenovo P1;8;60.33;USD\r\n" .
      "zen;Asus Zenbook;1;120.99;EUR";
    $result = $cart->output($input);
    $this->assertEquals("Macbook Pro has been added to cart.\r\n" .
      "Total has been updated to 59.98 EUR\r\n" .
      "Asus Zenbook has been added to cart.\r\n" .
      "Total has been updated to 323.11 EUR\r\n" .
      "Macbook Pro has been added to cart.\r\n" .
      "Total has been updated to 891.80 EUR\r\n" .
      "Asus Zenbook has been removed from cart.\r\n" .
      "Total has been updated to 628.67 EUR\r\n" .
      "Lenovo P1 has been added to cart.\r\n" .
      "Total has been updated to 1,052.04 EUR\r\n" .
      "Asus Zenbook has been added to cart.\r\n" .
      "Total has been updated to 1,173.03 EUR\r\n", $result);
  }
}