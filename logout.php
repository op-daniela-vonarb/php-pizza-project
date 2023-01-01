<?php
include("autoload.php");
include_once("classes/logout-contr.class.php");

$loginContr = new LogoutContr($_REQUEST);
$loginContr->handleRequest();

?>
