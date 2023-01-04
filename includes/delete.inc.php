<?php

include "../classes/delete-contr.class.php";

if(isset($_POST['delete'])) {

    $id_to_delete = $_POST['id_to_delete'];

    $this->removePizza($id_to_delete);

}