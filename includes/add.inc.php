<?php


// $pizza = ['title' => '', 'ingredients' => ''];
// $errors = ['title' => '', 'ingredients' => ''];


// if(isset($_POST["submit"])) {

//     $title = $_POST["title"];
//     $ingredients = $_POST["ingredients"];

//     include "../classes/dbh.class.php";
//     include "../classes/add.class.php";
//     include "../classes/add-contr.class.php";


//     $add = new AddContr($title, $ingredients);
 
//     $errors = $add->validateForm();
  
//     if(!$errors) {
//          $pizza = $add->addPizza();
//          header("location: ../index.php?error=none");
    
//     } else header("location: ../add.php?error");
 
// }