<?php

include_once("php-mysql-login/session_start.php");

?>

<!DOCTYPE html>
<!--

To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

    Created on : 2015-sept-01, 14:04:08
    Author     : arvid
-->
<html lang="en">
<head>
    <title>Tasty Recipes</title>
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
                <li><a href="index.php">Home</a></li>
                <li><a href="calendar.php">Calendar</a></li>
                <li><a href="php-mysql-login/signin.php">Sign In</a></li>
                <?php if(isset($_SESSION['id']) ){
                    echo '<li><a href="php-mysql-login/logged_out.php">Log out</a></li>';
                } ?>
            </ul>
        </div>
    </div>
    <div class="recipes-list">
        <div class="container">
            <h2>Welcome to Tasty Recipes</h2>
            <p>Below are the recipes available at the moment, or if you'd like to check them out in the calendar! </p>
            <p>Note that some of the links are not accessible at the moment, but pancakes and meatballs should be.</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="recipes/meatballs.php"><img src="../resources/images/Turkey-meatballs.jpg" alt="Meatballs page"></a>
                        <div class="other-recipes"><h4>Turkey Meatballs</h4></div>
                    </div>
                    <div class="thumbnail">
                        <a href="recipes/pancakes.php"><img src="../resources/images/AppleOatPancakes_DT.jpg" alt="Pancakes page"></a>
                        <div class="other-recipes"><h4>Honey-Oatmeal Pancakes</h4></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href=""><img src="../resources/images/icecream.jpg" alt="Colorful Icecream"></a>
                        <div class="other-recipes"><h4>Colorful Icecream</h4></div>
                    </div>
                    <div class="thumbnail">
                        <a href=""><img src="../resources/images/ultimate_BLT_sandwich.jpg" alt="Gorgeous BLT Sandwich"></a>
                        <div class="other-recipes"><h4>Ultimate BLT Sandwich</h4></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="../resources/images/aschberg.jpg" alt="The Chef Himself, Aschberg.">
                    </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>