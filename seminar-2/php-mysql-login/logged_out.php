<?php

# Disable error reporting
error_reporting(E_ALL & ~E_NOTICE);

# Start and destroy session
session_start();
session_destroy();

?>

<!DOCTYPE html>
<!--

To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

    Created on : 2016-sept-12, 18:04:08
    Author     : arvid
-->
<html lang="en">
<head>
    <title>Tasty Recipes - Log out</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3;url=../index.php" />

    <link rel="stylesheet" href="../resources/css/reset.css">
    <link rel="stylesheet" href="../resources/css/shift.css">
    <link rel="stylesheet" href="../resources/css/bootstrap.css">
    <link rel="stylesheet" href="../resources/css/main.css">
</head>
<body>
<div class="jumbotron">
    <div class="container">
        <h1>This. Is. Tasty. RECIPES!</h1>
    </div>
</div>
<div class="nav">
    <div class="container">
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../calendar.php">Calendar</a></li>
            <li><a href="signin.php">Sign In</a></li>
            <li><a href="logout.php">Log out</a></li>
        </ul>
    </div>
</div>
<div class="login-style">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="panel-body">
                            <p>Logged out! Redirecting in 3 seconds...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>