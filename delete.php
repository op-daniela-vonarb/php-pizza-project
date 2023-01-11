<?php

    include("autoload.php");
    include_once("delete-contr.class.php");
    include_once("auth-helper.class.php");

    $auth = AuthHelper::inst();

    $deleteContr = new DeleteContr($_REQUEST);
    $deleteContr->handleRequest();


    // if(isset($_SESSION["useruid"]))
    if($auth->isLoggedIn())

    {
    //no action attr needed in form?
    ?>
    <form method="POST">
        <!-- <input type="hidden" name="id_to_delete" value="<?php //echo $pizza['id'] ?>"> -->
        <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
    </form>

    <?php
    }
?>