<?php
    include_once 'partials/header.php';

    $errors = array('name' => '', 'email' => '', 'uid' =>'', 'pwd' => '', 'pwdrepeat' => '');

    if(isset($_GET["error"])) {

        if($_GET["error"] == "emptyinput") {
            $errors['name'] = 'Fill in all fields!';
        }
        else if ($_GET["error"] == "username") {
            $errors['uid'] = 'Choose a proper username!';
        }
        else if ($_GET["error"] == "email") {
            $errors['email'] = 'Choose a proper email!';
        }
        else if ($_GET["error"] == "passwordmatch") {
            $errors['pwd'] = 'Passwords do not match!';
        }
        else if ($_GET["error"] == "stmtfailed") {
            echo '<p>Something went wrong! Try again!</p>';
        }
        else if ($_GET["error"] == "useroremailtaken") {
            $errors['uid'] = 'Choose a different username';
        }
        else if ($_GET["error"] == "none") {
            echo "<p>You have signed up</p>";
        }
    }
?>
 
    <div class="index-login-signup">
        <h4>SIGN UP</h4>
        <p>Don't have an account yet? Sign up here!</p>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Full name...">
            <div><?php echo $errors['name']; ?></div>
            <input type="text" name="email" placeholder="Email...">
            <div><?php echo $errors['email']; ?></div>
            <input type="text" name="uid" placeholder="Username...">
            <div><?php echo $errors['uid']; ?></div>
            <input type="password" name="pwd" placeholder="Password...">
            <div><?php echo $errors['pwd']; ?></div>
            <input type="password" name="pwdrepeat" placeholder="Repeat Password...">
            <div><?php echo $errors['pwdrepeat']; ?></div>
            <br>
            <button type="submit" name="submit">SIGN UP</button>
        </form>
    </div>




<?php
    include_once 'partials/footer.php';
?>