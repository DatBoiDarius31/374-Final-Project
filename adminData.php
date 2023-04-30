<?php

$sSessID = 'clicktos8icvkqqgrtpkj3u610o9';
session_id($sSessID);
session_start();
include 'connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST');
{
    
    if($_POST['delInstructor'])
    {
        
        $id = $_POST['instructorID'];
        $sql = "DELETE FROM Instructors WHERE ID='$id'";
        $result = $link->query($sql);
        
    }

    if($_POST['addInstructor'])
    {
        $name = $_POST['instructorName'];
        $sql = "INSERT INTO Instructors (instructorname) values ('$name')";
        $result = $link->query($sql);
        
    }

    if($_POST['delMember'])
    {
        
        $id = $_POST['memberID'];
        $sql = "DELETE FROM Members WHERE ID='$id'";
        $result = $link->query($sql);
        
    }

    if($_POST['addMember'])
    {
        $user = $_POST['memberUsername'];
        $first = $_POST['memberFName'];
        $last = $_POST['memberLName'];
        $phone = $_POST['memberPhone'];
        $pass = $_POST['memberPassword'];
        
        $sql = "INSERT INTO Members (Username, Last_Name, First_Name, Phone, Date_Joined, Password) values ('$user', '$last', '$first', '$phone', NOW(), '$pass')";
        $result = $link->query($sql);
        
    }

    header("Location: admin.php");
        exit();
}



mysqli_close($database);
?>