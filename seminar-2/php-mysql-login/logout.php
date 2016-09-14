<?php

# Disable error reporting
error_reporting(E_ALL & ~E_NOTICE);

# Start session
session_start();

# If user presses submit
if (isset($_SESSION['id'])) {

    $userId = $_SESSION['id'];
    $username = $_SESSION['username'];
} else {
    header('Location: ../index.php');
    die();
}

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
                    <div class="panel-heading">
                        <h3 class="panel-title">Hello <?php echo $username; ?>, sorry to see you go!</h3>
                    </div>
                    <div class="panel-body">
                        <form action="logged_out.php">
                            <fieldset>
                                <input class="btn btn-lg btn-danger btn-block" type="submit" value="Log out">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>