<?php

$pizza = ['title' => '', 'ingredients' => ''];

if(isset($_POST["submit"])) {

    $title = $_POST["title"];
    $ingredients = $_POST["ingredients"];

    include "../classes/dbh.class.php";
    include "../classes/add.class.php";
    include "../classes/add-contr.class.php";

    // Instantiate LoginContr class
    $add = new AddContr($title, $ingredients);

    // Running error handlers and user login
    $pizza = $add->addPizza();
    // print_r($pizza);   

    // Going to back to front page
    header("location: ../index.php?error=none");
}