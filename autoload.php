
<?php

include_once("settings.php");
require_once("dbh.class.php");
require_once("repo.class.php");
require_once("users.class.php");
require_once("pizzas.class.php");
require_once("auth-helper.class.php");
require_once("contr.class.php");


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}