<?php

    include 'includes/dbh.inc.php';

    $title = $email = $ingredients = '';
    $errors = array('title' => '', 'ingredients' => '');

    if(isset($_POST['submit'])) {

        if(empty($_POST['title'])) {
            $errors['title'] = 'A title is required <br />';
        } else {
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				$errors['title'] = 'Title must be letters and spaces only';
			}
        }
        if(empty($_POST['ingredients'])) {
            $errors['ingredients'] = 'At least one ingredient is required <br />';
        } else {
            $ingredients = $_POST['ingredients'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
				$errors['ingredients'] = 'Ingredients must be a comma separated list';
			}
        }

        if(array_filter($errors)) {
            //echo 'errors in the form';
        } else {
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

            $sql = "INSERT INTO pizzas(title, ingredients) VALUES('$title', '$ingredients')";

            if(mysqli_query($conn, $sql)) {

                header('Location: index.php');

            } else {
                echo 'query error: ' . mysqli_error($conn);
            }
        }
    }


?>

<!DOCTYPE html>
<html lang="en">

    <?php include 'partials/header.php' ?>

    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form action="add.php" class="white" method="POST">
            <label>Pizza Title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
            <div class="red-text"><?php echo $errors['title']; ?></div>
            <label>Ingredients (comma separated):</label>
            <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
            <div class="red-text"><?php echo $errors['ingredients']; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include 'partials/footer.php' ?>
    
</html>