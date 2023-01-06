<?php

// if(isset($_POST["submit"])) {
  
//     include "../classes/dbh.class.php";
//     include "../classes/add.class.php";
//     include "../classes/add-contr.class.php";

//     $title = $_POST["title"];
//     $ingredients = $_POST["ingredients"];
    
//     $add = new AddContr($title, $ingredients);
 
//     $errors = $add->validateForm();
  
  
//     if(!$errors) {
//          $add->addPizza();
//          header("location: ../index.php?error=none");
//     } else {
//         include("../add.php");
//     }
// }