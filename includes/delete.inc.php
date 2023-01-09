<?php

    // include "../classes/dbh.class.php";
    // include "../classes/delete.class.php";
    // include "../classes/delete-contr.class.php";


    if(isset($_POST['delete'])) {

        include "../../classes/dbh.class.php"; // why can't I include outside if statement? See line 3-5
        include "../Model/delete.class.php";
        include "../Controller/delete-contr.class.php";

        $id_to_delete = $_POST['id_to_delete'];
        $data = new DeleteContr();
        $data->removePizza($id_to_delete);
        header("location: ../../public/index.php");

    }