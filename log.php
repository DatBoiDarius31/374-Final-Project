<?php

$sSessID = 'clicktos8icvkqqgrtpkj3u610o9';
session_id($sSessID);
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST');
{
    $user = $_POST['username'];
    $pass = $_POST['password1'];

    $user = trim($user);
    $pass = trim($pass);

    include 'connect.php';
    $sql = "SELECT * FROM Members WHERE username='$user' AND password='$pass'";
    $result = $link->query($sql);
    while($row = $result->fetch_assoc()){
	$first = $row['First_Name'];
	$last = $row['Last_Name'];
	$phone = $row['Phone'];
	$date = $row['Date_Joined'];
    }
    
    

    if($result->num_rows > 0)
    {
        $_SESSION['username'] = $user;
	$_SESSION['password'] = $pass;
	$_SESSION['first'] = $first;
	$_SESSION['last'] = $last;
	$_SESSION['phone'] = $phone;
	$_SESSION['date'] = $date;
	

        header("Location: members.php");
        exit();
    }

    else{
        header("Location: login.php");
        exit();
    }

}

mysqli_close($database);
?>