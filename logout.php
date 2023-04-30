<?php

$sSessID = 'clicktos8icvkqqgrtpkj3u610o9';
session_id($sSessID);
session_start();

header("Location: login.php");
unset($_SESSION['username']);
session_destroy();
header("Location: login.php");

?>