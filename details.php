<?php

    include 'config/db_connect.php';

    // check GET request id param
    if(isset($_GET['id'])) {

        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM pizzas WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        $pizza = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

    }

?>

<!DOCTYPE html>
<html>

	<?php include('partials/header.php'); ?>

    <h2>Details</h2>

	<?php include('partials/footer.php'); ?>

</html>