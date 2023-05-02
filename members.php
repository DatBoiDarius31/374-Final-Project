<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <?php
    
    include('header.html');
    $page_title = 'Member';
    include 'connect.php';
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

<br />
<br />
<div id="tablediv">
    <table class="memtable">
        <thead>
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Date Joined</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $user = $_SESSION['username'];
            $first = $_SESSION['first'];
            $last = $_SESSION['last'];
            $phone = $_SESSION['phone'];
            $date = $_SESSION['date'];
            echo "<tr><td>$user</td><td>$first</td><td>$last</td><td>$phone</td><td>$date</td></tr>";
            ?>
        </tbody>
    </table>
    <br />
    <br />
    <table class="paytable">
        <thead>
            <tr>
                <th>Payment Date</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $id = $_SESSION['id'];
           
            $sql = "SELECT * FROM Payments WHERE Member_Id='$id'";
            $result = @mysqli_query($link, $sql);
            
            while($row = $result->fetch_assoc()){
                $paydate = $row['Payment_Date'];
                $amount = $row['Amount'];            
                
                echo "<tr><td>$paydate</td><td>$amount</td></tr>";
            }
            ?>
        </tbody>
    </table>
<div>
</body>
</html>

