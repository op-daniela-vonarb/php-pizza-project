<?php

$conn = mysqli_connect('localhost', 'daniela', 'test1234', 'ninja_pizza');

if(!$conn) {
    echo 'Connection error:' . mysqli_connect_error();
}

?>