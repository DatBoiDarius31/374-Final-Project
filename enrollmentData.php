<?php
$page_title = 'Enroll';
include('header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('connect.php');
    $errors = array();

    // Get form data
    $sSessID = 'clicktos8icvkqqgrtpkj3u610o9';
    session_id($sSessID);
    session_start();
    $member_id = $_SESSION["id"];
    $programName = $_POST["programName"];

    if ($programName == "Tiny Tigers") {
        $payment_id = 1;
        $amount = 70.00;
        $payment_date = date("Y-m-d");
    } else if ($programName == "Little Ninjas") {
        $payment_id = 2;
        $amount = 100.00;
        $payment_date = date("Y-m-d");
    } else if ($programName == "Junior") {
        $payment_id = 3;
        $amount = 120.00;
        $payment_date = date("Y-m-d");
    } else if ($programName == "Defense and Tactical Training Program") {
        $payment_id = 4;
        $amount = 140.00;
        $payment_date = date("Y-m-d");
    }

    $instructor_id = $_POST["instructor_id"];

    if (empty($errors)) {
        // Insert data into MySQL table
        $q = "INSERT INTO Enrollments (member_id, payment_id, programName, instructor_id) VALUES ('$member_id', '$payment_id', '$programName', '$instructor_id');";
        $r = @mysqli_query($link, $q);

        $q2 = "INSERT INTO Payments (amount, member_id, payment_date) VALUES ('$amount', '$member_id', '$payment_date');";
        $r2 = @mysqli_query($link, $q2);

        if ($r && $r2) {
            echo '<h1>Enrolled</h1><p>You are now Enrolled.</p><p><a href="members.php">Members</a></p>';
        } else {
            echo '<p>' . mysqli_error($link) . '</p>';
        }

        mysqli_close($link);

        include('includes/footer.html');
        exit();
    }
} else {
    echo '<p class="error">This page has been accessed in error.</p>';
}

include('includes/footer.html');
