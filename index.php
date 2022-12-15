<?php

    $conn = mysqli_connect('localhost', 'daniela', 'test1234', 'ninja_pizza');

    if(!$conn) {
        echo 'Connection error:' . mysqli_connect_error();
    }


?>

<!DOCTYPE html>
<html lang="en">

    <?php include 'partials/header.php' ?>

    <?php include 'partials/footer.php' ?>
    
</html>