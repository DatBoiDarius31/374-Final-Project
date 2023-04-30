<?php
$page_title = 'Register';
include('header.html');

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        require('connect.php');
        $errors = array();

        $un = mysqli_real_escape_string($link, trim($_POST['username']));

        $fn = mysqli_real_escape_string($link, trim($_POST['firstname']));

        $ln = mysqli_real_escape_string($link, trim($_POST['lastname']));

        $e = mysqli_real_escape_string($link, trim($_POST['phone']));

        $p = mysqli_real_escape_string($link, trim($_POST['password1']));
    }



    if(empty($errors))
    {
        $q = "INSERT INTO Members (username,first_name, last_name, phone, password, date_joined) VALUES ('$un','$fn','$ln','$e','$p',NOW())";
        $r = @mysqli_query($link,$q);
        echo var_dump($r);

        if($r)
        {
            echo '<h1>Registered!</h1><p>You are now registered.</p><p><a href="enrollment.html">Enroll</a></p>';
        }
        ?>
        <?php
        mysqli_close($link);

        include('includes/footer.html');
        exit();
    }

    else
    {
        ?>
        <?php
        echo '<h1>Error!</h1><p id="err_msg">The folowing error(s) occurred:<br>';
        foreach($errors as $msg)
        {echo " - $msg<br>";}

        echo'Please try again.</p>';
        mysqli_close($link);
    }
