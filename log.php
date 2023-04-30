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
    $id = $row['ID'];
	$first = $row['First_Name'];
	$last = $row['Last_Name'];
	$phone = $row['Phone'];
	$date = $row['Date_Joined'];
    }
    
    

    if($result->num_rows > 0)
    {
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $user;
	$_SESSION['password'] = $pass;
	$_SESSION['first'] = $first;
	$_SESSION['last'] = $last;
	$_SESSION['phone'] = $phone;
	$_SESSION['date'] = $date;
	

       
        
    }

    else{
        header("Location: login.php");
        exit();
    }
    if($user == "admin" && $pass = "admin")
    {
        header("Location: admin.php");
        exit();
    }

    $sql = "SELECT * FROM Payments WHERE Member_Id='$id'";
    $result = $link->query($sql);
    while($row = $result->fetch_assoc()){
        $paydate = $row['Payment_Date'];
        $amount = $row['Amount'];
    }
    if($result->num_rows > 0)
    {
        $_SESSION['paydate'] = $paydate;
        $_SESSION['amount'] = $amount;
	

        header("Location: members.php");
        exit();
    }
    header("Location: members.php");
    exit();

}

mysqli_close($database);
?>