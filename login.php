
<?php
include("autoload.php");
include_once("login-contr.class.php");

$loginContr = new LoginContr($_REQUEST);
$loginContr->handleRequest();
$uid = $loginContr->getUid();
$pwd = $loginContr->getPwd();
$errors = $loginContr->getErrors();


include_once 'partials/header.php';
?>
     
    <div class="index-login-login">
        <h4>LOGIN</h4>
        <p>Don't have an account yet? Sign up here!</p>
        <form action="login.php" method="post">
            <input type="text" name="uid" value="<?php echo htmlspecialchars($uid ?? '') ?>"placeholder="Username/Email...">
            <div class="red-text"><?php echo $errors['uid'] ?? ''; ?></div>
            <input type="password" name="pwd" value="<?php echo htmlspecialchars($pwd ?? '') ?>"placeholder="Password">
            <div class="red-text"><?php echo $errors['pwd'] ?? ''; ?></div>
            <br>
            <button type="submit" name="submit">LOGIN</button>
        </form> 
        <?php

    ?>        
    </div>
<?php
    include_once 'partials/footer.php';
?>