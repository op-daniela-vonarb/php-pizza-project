<?php

include_once "partials/header.php";

include "autoload.php";
include_once("pizza-details-contr.class.php");

$auth = AuthHelper::inst();



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
				if($auth->isLoggedIn())

				{
				?>
				<form method="POST">
					<!-- <input type="hidden" name="id_to_delete" value="<?php //echo $pizza['id'] ?>"> -->
					<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
				</form>
			
				<?php
				}
            ?>


		<?php else: ?>
			<h5>No such pizza exists.</h5>
		<?php endif ?>
	</div>

    <?php include_once 'partials/footer.php'; ?>

</html>