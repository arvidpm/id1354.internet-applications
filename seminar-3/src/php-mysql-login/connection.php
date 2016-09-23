<?php

$servername = "localhost";
$username = "tastyrecipes";
$password = "BetterPassword!";
$dbname = "id1354-test";


# Establish connection to a local database
$dbCon = mysqli_connect($servername, $username, $password, $dbname);


if ($dbCon->connect_error) {
    die("Connection failed: " . $dbCon->connect_error);
} else {
    mysqli_set_charset($dbCon, 'utf8');
}