<?php
include_once($_SERVER['DOCUMENT_ROOT'])."/crud/config.php";

use Farija\Banner;
$_banner = new Banner;
$banners = $_banner->store();

?>