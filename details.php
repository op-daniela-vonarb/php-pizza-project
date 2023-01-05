<?php

include_once "partials/header.php";

include "classes/dbh.class.php";
include "classes/details.class.php";
include "classes/details-contr.class.php";
include "includes/details.inc.php";

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $data = new DetailsContr();
    $pizza = $data->showDetails($id);
}

?>

<!DOCTYPE html>
<html>

    <div class="container center grey-text">
		<?php if($pizza): ?>

			<h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
			<p>Created by <?php //echo htmlspecialchars($pizza['email']); ?></p>
			<h5>Ingredients:</h5>
			<p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

            <?php
                include "delete.php"
            ?>


		<?php else: ?>
			<h5>No such pizza exists.</h5>
		<?php endif ?>
	</div>

    <?php include_once 'partials/footer.php'; ?>

</html>