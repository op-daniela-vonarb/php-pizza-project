<?php


if(isset($_POST['delete'])) {

    include "../classes/delete-contr.class.php";

    $id_to_delete = $_POST['id_to_delete'];

    $this->removePizza($id_to_delete);

}