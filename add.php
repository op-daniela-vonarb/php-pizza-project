<?php
    // require "includes/add.inc.php";

    // $title = $pizza['title'];
    // $ingredients = $pizza['ingredients'];

    // $errorTitle = $errors['title'];
    // $errorIng = $errors['ingredients'];

    $title = '';
    $ingredients = '';

    include_once "partials/header.php";
    include "classes/dbh.class.php";
    include "classes/add.class.php";
    include "classes/add-contr.class.php";

    if(isset($_POST["submit"])) {

        $title = $_POST["title"];
        $ingredients = $_POST["ingredients"];
    
    
        $add = new AddContr($title, $ingredients);
     
        $errors = $add->validateForm();
      
        if(!$errors) {
             $add->addPizza();
             header("location: index.php?error=none");
        
        } else echo 'there are errors';
    }
    

?>


    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form action="add.php" class="white" method="POST">
            <label>Pizza Title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?? ''?>">
            <div class="red-text"><?php echo $errors['title'] ?? ''?></div>
            <label>Ingredients (comma separated):</label>
            <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?? '' ?>">
            <div class="red-text"><?php echo $errors['ingredients'] ?? '' ?></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>

    </section>

    <?php include 'partials/footer.php' ?>
