<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Easiest Way to Add Input Masks to Your Forms</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <?php

# Set page title and display header section.
$page_title = 'Login' ;
include ( 'header.html' ) ;

    ?>

    <div class="registration-form">
        <form action="log.php" method="post">
            <div class="form-group">
	
               <h1>Log in</h1>

            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="username" placeholder="User name" required />
            </div>

            <div class="form-group">
                <input type="password" class="form-control item" name="password1" placeholder="Password" required />
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Sign In</button>
            </div>
        </form>
        <div class="social-media">
             <a href="register.html">Sign up</a>
        </div>
    </div>
  
</body>
</html>
