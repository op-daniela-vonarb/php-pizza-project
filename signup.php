<?php
    include_once "partials/header.php";
    include "classes/signup-validator.class.php";
    include "classes/dbh.class.php";
    include "classes/signup.class.php";
    include "classes/signup-contr.class.php";

    if(isset($_POST["submit"])) {

        $validation = new SignupValidator($_POST);
        $errors = $validation->validateForm();      
  
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwdrepeat"];
    
        if(!$errors){
            $signup = new SignupContr($name, $email, $username, $pwd, $pwdRepeat);
            $signup->signupUser();
            header("location: index.php?error=none");
        } else echo 'there are errors';

    }

     
?>
 
    <div class="index-login-signup">
        <h4>SIGN UP</h4>
        <p>Don't have an account yet? Sign up here!</p>
        <form action="signup.php" method="POST">

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