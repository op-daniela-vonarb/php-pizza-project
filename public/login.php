<?php
    include_once '../partials/header.php';

    if(isset($_GET["error"])) {
        if($_GET["error"] == "emptyinput") {
            $errors['uid'] = 'Fill in all fields!';
        }
        else if ($_GET["error"] == "wrongpassword") {
            $errors['pwd'] = 'Incorrect login information';
        }
        else if ($_GET["error"] == "usernotfound") {
            $errors['uid'] = 'User not found';
        }
    }
?>
     
    <div class="index-login-login">
        <h4>LOGIN</h4>
        <p>Don't have an account yet? Sign up here!</p>
        <form action="login.inc.php" method="post">
            <input type="text" name="uid" value="<?php echo htmlspecialchars($uid ?? '') ?>"placeholder="Username/Email...">
            <div class="red-text"><?php echo $errors['uid'] ?? ''; ?></div>
            <input type="password" name="pwd" value="<?php echo htmlspecialchars($pwd ?? '') ?>"placeholder="Password">
            <div class="red-text"><?php echo $errors['pwd'] ?? ''; ?></div>
            <br>
            <button type="submit" name="submit">LOGIN</button>
        </form>  
    </div>
<?php
    include_once '../partials/footer.php';
?>