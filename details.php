<?php

include_once "partials/header.php";

include "autoload.php";
include_once("pizza-details-contr.class.php");



$pizzaContr = new PizzaDetailsContr($_REQUEST);
$pizzaContr->handleRequest();

?>

<!DOCTYPE html>
<html>

    <div class="container center grey-text">
		<?php if($pizzaContr->Pizza()): ?>

			<h4><?php echo htmlspecialchars($pizzaContr->Pizza()['title']); ?></h4>
			<h5>Ingredients:</h5>
			<p><?php echo htmlspecialchars($pizzaContr->Pizza()['ingredients']); ?></p>

            <?php
                include "delete.php" // used to have the delete form directly in here
            ?>


		<?php else: ?>
			<h5>No such pizza exists.</h5>
		<?php endif ?>
	</div>

    <?php include_once 'partials/footer.php'; ?>

</html>