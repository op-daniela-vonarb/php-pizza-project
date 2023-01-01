<?php

//    include 'includes/dbh.inc.php';

include "autoload.php";
include_once("classes/pizza-details-contr.class.php");

$pizzaContr = new PizzaDetailsContr($_REQUEST);
$pizzaContr->handleRequest();

//    if(isset($_POST['delete'])) {
//
//        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
//
//        $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";
//
//        if(mysqli_query($conn, $sql)) {
//
//            header("Location: index.php");
//        } else {
//            echo 'query error: ' . mysqli_error($conn);
//        }
//
//    }

?>

<!DOCTYPE html>
<html>

	<?php include('partials/header.php'); ?>

    <div class="container center grey-text">
		<?php if($pizzaContr->Pizza()): ?>

			<h4><?php echo htmlspecialchars($pizzaContr->Pizza()['title']); ?></h4>
			<p>Created by <?php //echo htmlspecialchars($pizza['email']); ?></p>
			<h5>Ingredients:</h5>
			<p><?php echo htmlspecialchars($pizzaContr->Pizza()['ingredients']); ?></p>

            <?php
                if(isset($_SESSION["useruid"]))
                {
                ?>
                <form method="POST">
                    <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
                    <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
                </form>

                <?php
                }
            ?>


		<?php else: ?>
			<h5>No such pizza exists.</h5>
		<?php endif ?>
	</div>

	<?php include('partials/footer.php'); ?>

</html>