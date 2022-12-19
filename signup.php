<?php
    include_once 'partials/header.php';
    include 'classes/user-validator.class.php';
    include "classes/dbh.class.php";
    include "classes/signup.class.php";
    include "classes/signup-contr.class.php";

    if(isset($_POST["submit"])) {
    
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwdrepeat"];
    
        $validation = new UserValidator($_POST);
        $errors = $validation->validateForm();

        // if no errors, sign up user
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

            <input type="text" name="name"  value="<?php echo htmlspecialchars($_POST['name'] ?? '') ?>" placeholder="Full name...">
            <div class="error"><?php echo $errors['name'] ?? '' ?></div>

            <input type="text" name="email" value="<?php echo htmlspecialchars($_POST['email']?? '') ?>" placeholder="Email...">
            <div class="error"><?php echo $errors['email'] ?? '' ?></div>

            <input type="text" name="uid" value="<?php echo htmlspecialchars($_POST['uid']?? '') ?>"  placeholder="Username...">
            <div class="error"><?php echo $errors['uid'] ?? '' ?></div>

            <input type="password" name="pwd" value="<?php echo htmlspecialchars($_POST['pwd']?? '') ?>"  placeholder="Password...">
            <div class="error"><?php echo $errors['pwd'] ?? '' ?></div>

            <input type="password" name="pwdrepeat" value="<?php echo htmlspecialchars($_POST['pwdrepeat']?? '') ?>"  placeholder="Repeat Password...">
            <div class="error"><?php echo $errors['pwdrepeat'] ?? '' ?></div>

            <br>
            <button type="submit" value="submit" name="submit">Submit</button>
        </form>
    </div>

<?php
    include_once 'partials/footer.php';
?>