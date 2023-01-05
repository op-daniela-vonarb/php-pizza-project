<?php

    if(isset($_SESSION["useruid"]))
    {
    ?>
    <form action="includes/delete.inc.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
        <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
    </form>

    <?php
    }
?>