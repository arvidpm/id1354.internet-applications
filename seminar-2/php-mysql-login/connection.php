<?php

# Establish connection to a local database
$dbCon = mysqli_connect("localhost", "root", "password", "id1354") OR die();

if (mysqli_connect_errno()) {
    echo "Failed to connect" . mysqli_connect_error();
}

?>