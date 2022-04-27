<?php
include_once($_SERVER['DOCUMENT_ROOT'])."/crud/config.php";

use Farija\User;
$_user = new User();
$users =$_user->delete();
?>