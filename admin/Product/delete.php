<?php
include_once($_SERVER['DOCUMENT_ROOT'])."/crud/config.php";

use Farija\Product;
$_product = new Product;
$products =$_product->delete();
?>