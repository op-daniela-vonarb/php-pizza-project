<?php

    include_once "partials/header.php";
    include("autoload.php");
    include_once("signup-contr.class.php");
   
    $signupContr = new SignupContr($_REQUEST);

    $signupContr->handleRequest();

    $name = $signupContr->getName();

    $uid = $signupContr->getUid();

    $email = $signupContr->getEmail();

    $pwd = $signupContr->getPwd();

    $pwdRepeat = $signupContr->getPwdRepeat();

    $errors = $signupContr->getErrors();

   
     
?>
 
    <div class="index-login-signup">
        <h4>SIGN UP</h4>
        <p>Don't have an account yet? Sign up here!</p>
        <form method="POST">

            <input type="text" name="name"  value="<?php echo htmlspecialchars($name ?? '') ?>" placeholder="Full name...">
            <div class="error"><?php echo $errors['name'] ?? '' ?></div>

            <input type="text" name="email" value="<?php echo htmlspecialchars($email ?? '') ?>" placeholder="Email...">
            <div class="error"><?php echo $errors['email'] ?? '' ?></div>

            <input type="text" name="uid" value="<?php echo htmlspecialchars($username ?? '') ?>"  placeholder="Username...">
            <div class="error"><?php echo $errors['uid'] ?? '' ?></div>

            <input type="password" name="pwd" value="<?php echo htmlspecialchars($pwd ?? '') ?>"  placeholder="Password...">
            <div class="error"><?php echo $errors['pwd'] ?? '' ?></div>

            <input type="password" name="pwdrepeat" value="<?php echo htmlspecialchars($pwdRepeat ?? '') ?>"  placeholder="Repeat Password...">
            <div class="error"><?php echo $errors['pwdrepeat'] ?? '' ?></div>

            <br>
            <button type="submit" value="submit" name="submit">Submit</button>
        </form>
    </div>

<?php
    include_once 'partials/footer.php';
?>