<?php

# Disable error reporting
error_reporting(E_ALL & ~E_NOTICE);

# Start session
session_start();

# If user presses submit
if ($_POST['submit']) {

    include_once("connection.php");
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

    # This is the database query
    $sql = "INSERT INTO members (username, password) VALUES ('$username','$password')";
    $query = mysqli_query($dbCon, $sql);

    if ($query) {
        header('Location: success.php');
    } else {
        header('Location: failed.php');
    }

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
    <title>Tasty Recipes - User registration</title>
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
            </ul>
        </div>
    </div>
    <div class="login-style">
        <div class="container">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Register user</h3>
			 	</div>
			  	<div class="panel-body">
                    <form accept-charset="UTF-8" role="form" method="post" action="signup.php">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Choose your username" name="username" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Choose a strong password" name="password" type="password" value="">
                        </div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="submit" value="Register">
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