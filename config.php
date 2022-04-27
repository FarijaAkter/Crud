<?php

if(session_status()==PHP_SESSION_NONE){
    session_start();
}
$webroot="http://localhost/crud/";
$approot= $_SERVER['DOCUMENT_ROOT']."/crud/";
include_once($approot."vendor/autoload.php");

?>