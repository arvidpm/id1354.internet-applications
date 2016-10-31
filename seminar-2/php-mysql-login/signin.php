<?php
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-14
 * Time: 10:59
 *
 * signin.php verifies a user by matching the $username to the database.
 * If a user is returned the entered password is verified to db hashed password
 * by built in function password_verify.
 * A Successful verification redirects user to index.php, else signin_failed.php
 *
 */

include_once("session_start.php");

# If user presses submit
if ($_POST['submit']) {

    include_once("connection.php");
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

    # This is the database query
    $sql = "SELECT * FROM members WHERE username = '$username' LIMIT 1";
    $query = mysqli_query($dbCon, $sql);

    if ($query) {

        $row = mysqli_fetch_row($query);
        $userId = $row[0];
        $dbUsername = $row[1];
        $dbHashPassword = $row[2];

        $verifiedPassword = password_verify($password, $dbHashPassword);

    }


    if ($username == $dbUsername && $verifiedPassword) {

        $_SESSION['username'] = $username;
        $_SESSION['id'] = $userId;
        header('Location: ../index.php');
    } else {
        header('Location: signin_failed.php');
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
    <title>Tasty Recipes - Sign in</title>
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
            <?php if (isset($_SESSION['id'])) {
                echo '<li><a href="logged_out.php">Log out</a></li>';
            } ?>
        </ul>
    </div>
</div>
<div class="login-style">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please sign in</h3>
                    </div>
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form" method="post" action="signin.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <div class="signup-style">
                                    <label>
                                        Don't have an account? <a href="signup.php">Sign up</a>
                                    </label>
                                </div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" name="submit"
                                       value="Login">
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