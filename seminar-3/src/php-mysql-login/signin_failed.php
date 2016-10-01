<?php
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-14
 * Time: 10:59
 */

include_once("session_start.php");

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <title>Tasty Recipes - Unsuccessful signin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../resources/css/reset.css">
    <link rel="stylesheet" href="../../resources/css/shift.css">
    <link rel="stylesheet" href="../../resources/css/bootstrap.css">
    <link rel="stylesheet" href="../../resources/css/main.css">
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
            <?php if(isset($_SESSION['id']) ){
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
                        <h3 class="panel-title">Ooops, something went wrong!</h3>
                    </div>
                    <div class="panel-body">
                        <p>Incorrect username or password! <a href="signin.php">Try again</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>