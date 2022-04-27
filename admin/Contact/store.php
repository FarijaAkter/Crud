<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/
include_once ($_SERVER['DOCUMENT_ROOT']."/crud/config.php");

use Farija\Contact;

$_contact =new Contact();

$contacts = $_contact->store();
?>