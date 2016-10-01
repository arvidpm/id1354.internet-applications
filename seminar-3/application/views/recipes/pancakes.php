<?php

/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-14
 * Time: 20:47
 */

include_once("../php-mysql-login/session_start.php");
include_once("../php-mysql-login/connection.php");

# Setting page where user's at
$_SESSION['page'] = 1;

# Loading recipe data
$url = '../resources/recipes/pancakes.xml';
$xml = simplexml_load_file($url) or die("Can't load file.");

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
    <title>Tasty Recipes - Pancakes recipe</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../../../resources/css/reset.css">
    <link rel="stylesheet" href="../../../resources/css/shift.css">
    <link rel="stylesheet" href="../../../resources/css/bootstrap.css">
    <link rel="stylesheet" href="../../../resources/css/main.css">
    <link rel="stylesheet" href="../../../resources/css/recipes.css">
    <link rel="stylesheet" href="../../../resources/css/commentbox.css">
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
                <li><a href="../../../src/index.php">Home</a></li>
                <li><a href="../../../src/calendar.php">Calendar</a></li>
                <li><a href="../../../src/php-mysql-login/signin.php">Sign In</a></li>
                <?php if(isset($_SESSION['id']) ){
                    echo '<li><a href="../../../src/php-mysql-login/logged_out.php">Log out</a></li>';
                } ?>
            </ul>
        </div>
    </div>
    <div class="recipes-list">
        <div class="container">
            <?php foreach ($xml->recipe as $recipe) {
                echo "<h2>$recipe->title</h2>";
            } ?>
            <div class="row">
                <div class="col-md-3">
                    <div class="thumbnail">
                        <a href=""><img src="../../../resources/images/AppleOatPancakes_DT.jpg" alt="Pancakes page"></a>
                    </div>
                    <h4>Ingredients</h4>
                    <ul>
                        <?php foreach ($recipe->ingredient->children() as $child) {
                            echo "<li> $child </li>";
                        } ?>
                    </ul>
                    <ul>
                        <?php foreach ($recipe->nutrition->children() as $child)
                        {
                            echo "<li> $child </li>";
                        }  ?>
                    </ul>   
                </div>
                <div class="col-md-5">
                    <h4>Directions</h4>
                    <?php foreach ($recipe->recipetext->children() as $child) {
                        echo "<p>$child </p>";
                    } ?>
                </div>
                <div class="col-md-4">
                    <div class="detailBox">
                        <div class="titleBox">
                            <label>Recipe comments</label>
                        </div>
                        <div class="actionBox">
                            <ul class="commentList">

                                <?php

                                # Query for getting comments table data
                                $page = $_SESSION['page'];
                                $comments_query = "SELECT * FROM comments WHERE page = '$page'";
                                $comments_result = mysqli_query($dbCon, $comments_query);

                                while ($row = mysqli_fetch_array($comments_result)) {
                                    $id = $row[0];
                                    $user = $row[1];
                                    $comment = $row[2];

                                    # Query for getting username related to comment
                                    $user_query = "SELECT username FROM members WHERE id = '$user' LIMIT 1";
                                    $user_result = mysqli_query($dbCon, $user_query);
                                    $current_user = mysqli_fetch_array($user_result);

                                    # Printing comments
                                    echo

                                    '<li>
                                        <div class="commenterImage">
                                            <img src="../../../resources/images/comment_placeholder.jpg" />';

                                    if ($user === $_SESSION['id']) {
                                        echo '<a href="../php-mysql-login/delete_comment.php?del=' .$id. ' "><img src="../resources/images/trashcan.png" alt="trashcan icon"></a>';
                                    }

                                    echo
                                        '</div>
                                        <div class="commentText">                                           
                                            <p class="">'. $comment . '</p>
                                            <span class="date sub-text">'. $current_user['username'] .'</span>
                                        </div>
                                    </li>';
                                }
                                ?>

                            </ul>

                            <form class="form-inline" role="form" action="../../../src/php-mysql-login/create_comment.php" method="post">

                                <?php if(isset($_SESSION['id']) ){

                                    echo

                                    '<div class="form-group">
                                    <input class="form-control" type="text" placeholder="Your comment" name="comment" />
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-default">Post</button>
                                </div>';

                                } else{

                                    echo

                                    '<div class="form-group">
                                    <input class="form-control" type="text" placeholder="Log in to comment!" />
                                </div>';
                                }
                                ?>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="other-recipes">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <h3>Turkey Meatballs</h3>
                        <div class="thumbnail">
                        <a href="meatballs.php"><img src="../../../resources/images/Turkey-meatballs.jpg" alt="Meatballs page"></a>
                        </div>
                    </div>
                <div class="col-md-2">
                    <h3>Icecream</h3>
                    <div class="thumbnail">
                        <a href=""><img src="../../../resources/images/icecream.jpg" alt="Colorful Icecream"></a>
                    </div>
                </div>
                <div class="col-md-2">
                    <h3>BLT Sandwich</h3>
                    <div class="thumbnail">
                        <a href=""><img src="../../../resources/images/ultimate_BLT_sandwich.jpg" alt="Gorgeous BLT Sandwich"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>