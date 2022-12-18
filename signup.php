<?php
    include_once 'partials/header.php';
?>
 
    <div class="index-login-signup">
        <h4>SIGN UP</h4>
        <p>Don't have an account yet? Sign up here!</p>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Full name...">
            <input type="text" name="email" placeholder="Email...">
            <input type="text" name="uid" placeholder="Username...">
            <input type="password" name="pwd" placeholder="Password...">
            <input type="password" name="pwdrepeat" placeholder="Repeat Password...">
            <br>
            <button type="submit" name="submit">SIGN UP</button>
        </form>
        <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields!</p>";
            }
            else if ($_GET["error"] == "username") {
                echo "<p>Choose a proper username!</p>";
            }
            else if ($_GET["error"] == "email") {
                echo "<p>Choose a proper email!</p>";
            }
            else if ($_GET["error"] == "passwordmatch") {
                echo "<p>Passwords don't match!</p>";
            }
            else if ($_GET["error"] == "stmtfailed") {
                echo "<p>Something went wrong! Try again!</p>";
            }
            else if ($_GET["error"] == "useroremailtaken") {
                echo "<p>Choose a different username</p>";
            }
            else if ($_GET["error"] == "none") {
                echo "<p>You have signed up</p>";
            }
        }
    ?>
    </div>




<?php
    include_once 'partials/footer.php';
?>