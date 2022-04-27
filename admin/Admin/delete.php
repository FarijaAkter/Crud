<?php
include_once($_SERVER['DOCUMENT_ROOT'])."/crud/config.php";

use Farija\Admin;

$_admin = new Admin();
$admins = $_admin->delete() ;
?>