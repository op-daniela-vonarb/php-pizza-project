<?php

//    include "classes/dbh.class.php";
//    include "classes/pizzas.class.php";
//    include "classes/pizzasview.class.php";
//    include "includes/pizzas.inc.php";
	include("autoload.php");
	include_once("classes/pizzas-contr.class.php");

	$pizzaContr = new PizzasContr($_REQUEST);
	$pizzaContr->handleRequest();
?>

<!DOCTYPE html>
<html lang="en">

    <?php include 'partials/header.php' ?>

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
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>

    </div>

    <?php include 'partials/footer.php' ?>
    
</html>

