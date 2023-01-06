<?php

if(isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/login-contr.class.php";

    // Instantiate LoginContr class
    $login = new LoginContr($username, $pwd);

    // Running error handlers and user login
    $login->loginUser();

    // Going to back to front page
    header("location: ../index.php?error=none");
}