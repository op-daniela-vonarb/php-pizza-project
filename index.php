<?php

    include_once "partials/header.php";

	include("autoload.php");
	include_once("pizzas-contr.class.php");

	$pizzaContr = new PizzasContr($_REQUEST);
    print_r($pizzaContr);
	$pizzaContr->handleRequest(); // does this function do something?

?>

<!DOCTYPE html>
<html lang="en">
  
    <h4 class="center grey-text">Pizzas!</h4>

    <div class="container">
        <div class="row">
            <?php foreach($pizzaContr->Pizzas() as $pizza): ?>

                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <img src="img/pizza.svg" class="pizza">
                        <div class="card-content center">
                            <h6><?php echo ($pizza['title']); ?></h6>
                            <ul class="grey-text">
								<?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
									<li><?php echo htmlspecialchars($ing); ?></li>
								<?php endforeach; ?>
							</ul>
                        </div>
                         <div class="card-action right-align">
                            <a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">more info</a>
                            <!-- <form action="details.php" method="POST">
                            <input type="hidden" name="id_to_details" value="<?php //echo $pizza['id'] ?>">
                            <input type="submit" name="details" value="MORE INFO" class="btn brand z-depth-0">
                            </form> -->
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>

    </div>

    <?php include_once 'partials/footer.php'; ?>
    
</html>

