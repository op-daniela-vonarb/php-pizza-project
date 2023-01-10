<?php
  
    include_once "partials/header.php";
    include("autoload.php");
    include_once("add-contr.class.php");

    $addContr = new AddContr($_REQUEST);
    $addContr->handleRequest();


    // if($_SERVER["REQUEST_METHOD"] == "POST"){

    //     $title = htmlspecialchars($_POST["title"], ENT_QUOTES, 'UTF-8');
    //     $ingredients = htmlspecialchars($_POST["ingredients"], ENT_QUOTES, 'UTF-8');
        
    //     $add = new AddContr($title, $ingredients);
     
    //     $errors = $add->validateForm();
      
    //     if(!$errors) {
    //          $add->addPizza();
    //          header("location: index.php?error=none");
    //     }
    // }

?>

    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form action="add.php" class="white" method="POST">
            <label>Pizza Title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title ?? '') ?>">
            <div class="red-text"><?php echo $errors['title'] ?? ''?></div>
            <label>Ingredients (comma separated):</label>
            <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients ?? '') ?>">
            <div class="red-text"><?php echo $errors['ingredients'] ?? '' ?></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>

    </section>

    <?php include_once 'partials/footer.php';?>
