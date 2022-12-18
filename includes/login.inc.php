<?php

if(isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/login-contr.class.php";

    // Instantiate SingupContr class
    $login = new LoginContr($username, $pwd);

    // Running error handlers and user signup
    $login->loginUser();

    // Going to back to front page
    header("location: ../index.php?error=none");
}