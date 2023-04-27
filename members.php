<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <title></title>
</head>
<body>
    <?php
    include('header.html');
    $sSessID = 'clicktos8icvkqqgrtpkj3u610o9';
    session_id($sSessID);
    session_start();


    if($_SESSION["username"])
    {
        echo ("Welcome, ".$_SESSION["username"]).', Click here to <a href="logout.php" title="Logout">Logout</a>';
    }
    else{
        header("Location: login.php");
        unset($_SESSION['username']);
        session_destroy();
        header("Location: login.php");
        exit();
    }

	

    ?>
<br>
<table>
	<tr>
	<td>Username</td>
	<td>First Name</td>
	<td>Last Name</td>
	<td>Phone</td>
	<td>Date Joined</td>
	</tr>
	<?php
	$user = $_SESSION['username'];
	$first = $_SESSION['first'];
	$last = $_SESSION['last'];
	$phone = $_SESSION['phone'];
	$date = $_SESSION['date'];
    echo "<tr><td>$user</td><td>$first</td><td>$last</td><td>$phone</td><td>$date</td></tr>";
  ?></table>
</body>
</html>

