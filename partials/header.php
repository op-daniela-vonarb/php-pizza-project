<?php
    include("autoload.php");
    include_once("auth-helper.class.php");
    $auth = AuthHelper::inst();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Pizza</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
	    .brand{
	  	    background: #cbb09c !important;
	    }
  	    .brand-text{
  		    color: #cbb09c !important;
  	    }
        form{
  		    max-width: 460px;
  		    margin: 20px auto;
  		    padding: 20px;
  	    }
        .pizza{
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }
        .error{
            color: coral;
        }
        
  </style>
</head>
    <body class="grey lighten-4">
        <nav class="white z-depth-0">
            <div class="container">
                <a href="index.php" class="brand-logo brand-text">Daniela's Pizza</a>
                <ul id="nav-mobile" class="right hide-on-small-and-down">

                    <?php
                    if($auth->isLoggedIn())
                    {
                    ?>
                    <li><a class="btn brand z-depth-0"><?php echo $auth->getCurrentUserId(); ?></a></li>
                    <li><a href="logout.php" class="btn brand z-depth-0">LOGOUT</a></li>
                    <li><a href="add.php" class="btn brand z-depth-0">Add a Pizza</a></li>

                    <?php
                    }
                    else
                    {

                    ?>
                
                    <li><a href="signup.php" class="btn brand z-depth-0">SIGN UP</a></li>
                    <li><a href="login.php" class="btn brand z-depth-0">LOGIN</a></li>
                    <?php
                    }
                    ?>

                </ul>
            </div>
        </nav>
