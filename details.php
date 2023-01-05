<?php

include "classes/dbh.class.php";
include "classes/details.class.php";
include "classes/details-contr.class.php";
include "classes/delete.class.php";
include "classes/delete-contr.class.php";
include "includes/details.inc.php";


if(isset($_GET['id'])){

    $id = $_GET['id'];
    $data = new DetailsContr();
    $pizza = $data->showDetails($id);
}

if(isset($_POST['delete'])) {

    $id_to_delete = $_POST['id_to_delete'];
    $data = new DeleteContr();
    $data->removePizza($id_to_delete);
    header("location: index.php");

}

?>

<!DOCTYPE html>
<html>

	<?php include('partials/header.php'); ?>

    <div class="container center grey-text">
		<?php if($pizza): ?>

			<h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
			<p>Created by <?php //echo htmlspecialchars($pizza['email']); ?></p>
			<h5>Ingredients:</h5>
			<p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

            <?php
                if(isset($_SESSION["useruid"]))
                {
                ?>
                <form action="details.php" method="POST">
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