<?php

$serverName = "localhost";
$username = "root";
$pasword = "meh";
$dbName = "Operative";

$conn = mysqli_connect($serverName, $username, $pasword, $dbName);

if (!$conn) {
    die("Something went wrong :( :" .mysqli_connect_error());
}

