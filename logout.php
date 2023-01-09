
<?php
include("autoload.php");
include_once("logout-contr.class.php");

$loginContr = new LogoutContr($_REQUEST);
$loginContr->handleRequest();

?>