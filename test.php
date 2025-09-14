<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$localhost = "localhost";
$user = "shreesaisamrth_mlm";
$pass = "lokpal72@@";
$db = "shreesaisamrth_mlm";

$connect = mysqli_connect($localhost, $user, $pass, $db);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
?>
