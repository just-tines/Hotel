<?php
session_start();
$serverName = 'localhost';
$userName = 'root';
$password = '';
$dbName = 'register';

/* Create a connection */
$con = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
