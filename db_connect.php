<?php
$server = "localhost";
$username = "root";
$password = "";  // Set your MySQL password here
$database = "user";
$port = "4306";

$conn = mysqli_connect($server, $username, $password, $database, $port) ;

if (!$conn) {
    die("error: " . mysqli_connect_error());
} else {
    //echo "success";
}
?>
