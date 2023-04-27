<?php

$servername = "rei.cs.ndsu.nodak.edu";
$username = "jackson_thurn_371s23";
$password = "GtPWsrSEpN0!";
$database = "jackson_thurn_db371s23";

$link = mysqli_connect($servername, $username, $password, $database);

if (mysqli_connect_errno()) {
    die("Connect failed: %s\n" + mysqli_connect_error());
    exit();
}
else{
    echo "Connected successfully";

}

?>