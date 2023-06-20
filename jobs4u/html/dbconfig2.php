<?php

$serverName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "jobs4U";

$con = mysqli_connect($serverName, $dbUser, $dbPassword, $dbName);

if (!$con) {
      die("Failed to connect database" . mysqli_connect_error());
}
