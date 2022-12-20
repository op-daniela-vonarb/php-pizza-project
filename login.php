<?php
    include_once 'partials/header.php';

    $uid = $pwd = '';
    $errors = array('uid' => '', 'pwd' => '');

    if(isset($_GET["error"])) {
        if($_GET["error"] == "emptyinput") {
            $errors['uid'] = 'Fill in all fields!';
        }
        else if ($_GET["error"] == "wrongpassword") {
            $errors['pwd'] = 'Incorrect login information';
        }
    }
?>

     
    <div class="index-login-login">
        <h4>LOGIN</h4>
        <p>Don't have an account yet? Sign up here!</p>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username/Email...">
            <div class="red-text"><?php echo $errors['uid']; ?></div>
            <input type="password" name="pwd" placeholder="Password">
            <div class="red-text"><?php echo $errors['pwd']; ?></div>
            <br>
            <button type="submit" name="submit">LOGIN</button>
        </form>
        <?php
        // if(isset($_GET["error"])) {
        //     if($_GET["error"] == "emptyinput") {
        //         echo "<p>Fill in all fields!</p>";
        //     }
        //     else if ($_GET["error"] == "wrongpassword") {
        //         echo "<p>Incorrect login information</p>";
        //     }
        // }
    ?>        
    </div>
<?php
    include_once 'partials/footer.php';
?>