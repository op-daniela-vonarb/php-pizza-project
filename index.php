<?php

    $conn = mysqli_connect('localhost', 'daniela', 'test1234', 'ninja_pizza');

    if(!$conn) {
        echo 'Connection error:' . mysqli_connect_error();
    }

    // write query for all pizzas
    $sql = 'SELECT title, ingredients, id FROM pizzas';

    // make query & get result
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // free result from memory
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);

    print_r($pizzas);




?>

<!DOCTYPE html>
<html lang="en">

    <?php include 'partials/header.php' ?>

    <?php include 'partials/footer.php' ?>
    
</html>