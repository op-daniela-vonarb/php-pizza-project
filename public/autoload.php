
<?php

include_once("settings.php");
require_once("../classes/dbh.class.php");
require_once("../src/Model/repo.class.php");
require_once("../src/Model/users.class.php");
require_once("../src/Model/pizzas.class.php");
require_once("../src/Helper/auth-helper.class.php");
require_once("../src/Controller/contr.class.php");

session_start();