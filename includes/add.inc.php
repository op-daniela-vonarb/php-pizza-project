<?php

if(isset($_POST["submit"])) {

    $title = $_POST["title"];
    $ingredients = $_POST["ingredients"];

    include "../classes/dbh.class.php";
    include "../classes/add.class.php";
    include "../classes/add-contr.class.php";

    // Instantiate LoginContr class
    $add = new AddContr($title, $ingredients);

    // Running error handlers and user login
    $add->addPizza();

    // Going to back to front page
    header("location: ../index.php?error=none");
}