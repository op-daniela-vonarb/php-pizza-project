
<?php
include("autoload.php");
include_once("login-contr.class.php");

$loginContr = new LoginContr($_REQUEST);
$loginContr->handleRequest();


include_once 'partials/header.php';
?>
     
    <div class="index-login-login">
        <h4>LOGIN</h4>
        <p>Don't have an account yet? Sign up here!</p>
        <form method="post">
            <input type="text" name="uid" value="<?php echo htmlspecialchars($uid ?? '') ?>"placeholder="Username/Email...">
            <div class="red-text"><?php echo $errors['uid'] ?? ''; ?></div>
            <input type="password" name="pwd" value="<?php echo htmlspecialchars($pwd ?? '') ?>"placeholder="Password">
            <div class="red-text"><?php echo $errors['pwd'] ?? ''; ?></div>
            <br>
            <button type="submit" name="submit">LOGIN</button>
        </form> 
        <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields!</p>";
            }
            else if ($_GET["error"] == "wronglogin") {
                echo "<p>Incorrect login information</p>";
            }
        }
    ?>        
    </div>
<?php
    include_once 'partials/footer.php';
?>