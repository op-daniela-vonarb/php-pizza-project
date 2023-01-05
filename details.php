<?php

include "classes/dbh.class.php";
include "classes/details.class.php";
include "classes/details-contr.class.php";
include "includes/details.inc.php";


if(isset($_GET['id'])){

    $id = $_GET['id'];
    $data = new DetailsContr();
    $pizza = $data->showDetails($id);
    // print_r($pizza);
    // echo($pizza[0]['title']);

}


    // include 'includes/dbh.inc.php';

    // if(isset($_POST['delete'])) {

    //     $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    //     $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    //     if(mysqli_query($conn, $sql)) {

    //         header("Location: index.php");
    //     } else {
    //         echo 'query error: ' . mysqli_error($conn);
    //     }

    // }

    // check GET request id param
    // if(isset($_GET['id'])) {

    //     $id = mysqli_real_escape_string($conn, $_GET['id']);

    //     $sql = "SELECT * FROM pizzas WHERE id = $id";

    //     $result = mysqli_query($conn, $sql);

    //     $pizza = mysqli_fetch_assoc($result);

    //     mysqli_free_result($result);
    //     mysqli_close($conn);

    // }

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