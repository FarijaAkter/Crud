<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/crud/config.php");

use Farija\Category;

$_category = new Category();
$categorys = $_category->delete();

?>