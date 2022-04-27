<?php
include_once($_SERVER['DOCUMENT_ROOT'])."/crud/config.php";

use Farija\Cart;

$_cart = new Cart();
$carts= $_cart->update() ;
?>





