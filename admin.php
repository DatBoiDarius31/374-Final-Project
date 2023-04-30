<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
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
$page_title = 'Admin' ;
include ( 'header.html' ) ;
$sSessID = 'clicktos8icvkqqgrtpkj3u610o9';
    session_id($sSessID);
    session_start();
    include 'connect.php';
    echo ("Welcome, ".$_SESSION["username"]).', Click here to <a href="logout.php" title="Logout">Logout</a>';
    echo '<br />';
    echo "<div class='column'>";
    echo('Instructor List: <br />');
    echo "<table>";
    echo "<tr>";
    echo "<th> ID </th>";
    echo "<th> Instructor </th>";
    echo "</tr>";
    
    $sql = "SELECT * FROM Instructors";
    $result = $link->query($sql);
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['InstructorName'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<form action='adminData.php' method='post'>";
    echo "<input type='text' name='instructorID'/>";
    echo "<input type='submit' name='delInstructor' class='button' value='Delete by ID' />";
    echo "</form>";
    echo "<form action='adminData.php' method='post'>";
    echo "<input type='text' name='instructorName'/>";
    echo "<input type='submit' name='addInstructor' class='button' value='Add by Name' />";
    echo "</form>";
    echo "</div>";

    #column 2
    echo "<div class='column'>";
    echo "Member List: <br />";
    echo "<table>";
    echo "<tr>";
    echo "<th> ID </th>";
    echo "<th> User Name </th>";
    echo "<th> Frist Name </th>";
    echo "<th> Last Name </th>";
    echo "<th> Phone </th>";
    echo "<th> Date Joined </th>";
    echo "</tr>";

    $sql = "SELECT * FROM Members";
    $result = $link->query($sql);
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Username'] . "</td>";
        echo "<td>" . $row['First_Name'] . "</td>";
        echo "<td>" . $row['Last_Name'] . "</td>";
        echo "<td>" . $row['Phone'] . "</td>";
        echo "<td>" . $row['Date_Joined'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<form action='adminData.php' method='post'>";
    echo "<input type='text' name='memberID'/>";
    echo "<input type='submit' name='delMember' class='button' value='Delete by ID' />";
    echo "</form>";
    echo "<br /><br />";

    echo "<form action='adminData.php' method='post'>";
    echo "<h5>Add new Member</h5>";
    echo "<p>User Name: </p><input type='text' name='memberUsername'/>";
    echo "<p>First Name: </p><input type='text' name='memberFName'/>";
    echo "<p>Last Name: </p><input type='text' name='memberLName'/>";
    echo "<p>Phone: </p><input type='text' name='memberPhone'/>";
    echo "<p>Password: </p><input type='text' name='memberPassword'/>";
    echo "<input type='submit' name='addMember' class='button' value='Add Member' />";
    echo "</form>";
    echo "</div>";

    echo "</div>"
    
    

    
?>
    
</body>
</html>