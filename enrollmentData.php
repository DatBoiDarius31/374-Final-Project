<?php
// Connect to MySQL database
if($_SERVER['REQUEST_METHOD'] == 'POST')
{

require('connect.php');
        $errors = array();


      



// Get form data
$member_id = $_SESSION["id"];
$programName = $_POST["programName"];

if($programName == "Tiny Tigers"){
    $payment_id = 1;
    $amount = 70.00;
    $payment_date = date("m-d-Y");
}
else if($programName == "Little Ninjas"){
    $payment_id = 2;
    $amount = 100.00;
    $payment_date = date("m-d-Y");
    
}
else if($programName == "Junior"){
    $payment_id = 3;
    $amount = 120.00;
    $payment_date = date("m-d-Y");
}
else if($programName == "Defense and Tactical Training Program"){
    $payment_id = 4;
    $amount = 170.00;
    $payment_date = date("m-d-Y");
}

$instructor_id = $_POST["instructor_id"];
}

if(empty($errors)){
// Insert data into MySQL table
$q = "INSERT INTO Enrollments (member_id, payment_id, programName, instructor_id) VALUES ('$member_id', '$payment_id', '$programName', '$instructor_id')";
$q2 = "INSERT INTO Payments (amount,member_id,payment_date) VALUES ('$payment_id','$member_id','$payment_date')";
$r = @mysqli_query($link,$q);
$r2 = @mysqli_query($link,$q2);
echo var_dump($r);
echo var_dump($r2);

if($r || $r2)
        {
            echo '<h1>Registered!</h1><p>You are now Enrolled.</p><p><a href="members.php">Members</a></p>';
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
        echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>';
        foreach($errors as $msg)
        {echo " - $msg<br>";}

        echo'Please try again.</p>';
        mysqli_close($link);
    }
?>


