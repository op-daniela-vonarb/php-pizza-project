<?php
  
    include_once "partials/header.php";
    include("autoload.php");
    include_once("add-contr.class.php");

    $addContr = new AddContr($_REQUEST);

    $addContr->handleRequest();

    $title = $addContr->getTitle();

    $ingredients = $addContr->getIngredients();

    $errors = $addContr->getErrors();

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
