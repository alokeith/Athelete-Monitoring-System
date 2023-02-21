<?php

// database information
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "ams"; // database name in mysql

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
