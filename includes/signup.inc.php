<?php

if(isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    // Instantiate SingupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";

    $signup = new SignupContr($name, $email, $username, $pwd, $pwdRepeat);

    // Running error handlers and user signup
    $signup->signupUser();

    // Going to back to front page
    header("location: ../index.php?error=none");

}