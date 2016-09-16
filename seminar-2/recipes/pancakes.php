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
    
    <link rel="stylesheet" href="../resources/css/reset.css">
    <link rel="stylesheet" href="../resources/css/shift.css">
    <link rel="stylesheet" href="../resources/css/bootstrap.css">
    <link rel="stylesheet" href="../resources/css/main.css">
    <link rel="stylesheet" href="../resources/css/recipes.css">
    <link rel="stylesheet" href="../resources/css/commentbox.css">
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
                <li><a href="../php-mysql-login/signin.php">Sign In</a></li>
                <?php if(isset($_SESSION['id']) ){
                    echo '<li><a href="../php-mysql-login/logged_out.php">Log out</a></li>';
                } ?>
            </ul>
        </div>
    </div>
    <div class="recipes-list">
        <div class="container">
            <h2>Honey-Oatmeal Pancakes</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="thumbnail">
                        <a href=""><img src="../resources/images/AppleOatPancakes_DT.jpg" alt="Pancakes page"></a>
                    </div>
                    <h4>Ingredients</h4>
                    <ul>
                    <li>1/2 cup whole wheat flour</li>
                    <li>1 tablespoon brown sugar</li>
                    <li>1 teaspoon baking powder</li>
                    <li>1 teaspoon baking powder</li>
                    <li>1/2 teaspoon salt</li>
                    <li>1 1/4 cups quick-cooking rolled oats</li>
                    <li>1 1/4 cups milk</li>
                    <li>2 eggs, slightly beaten</li>
                    <li>3 tablespoons margarine or butter, melted</li>
                    <li>2 tablespoons honey</li>
                    <li>Milk (optional)</li>
                    </ul>
                    <h4>Nutrition summary (per serving)</h4>
                    <ul>
                    <li>114 kcal cal.</li>
                    <li>5 g fat (1 g sat. fat, 37 mg chol.)</li>
                    <li>1 mg sodium</li>
                    <li>14 g carb.</li>
                    <li>1 g fiber</li>
                    <li>4 g pro</li>    
                    </ul>   
                </div>
                <div class="col-md-5">
                    <h4>Directions</h4>
                    <p>In a large mixing bowl combine whole wheat flour, brown sugar, baking powder, and salt. In another mixing bowl combine rolled oats and milk; let stand 10 minutes.</p>
                    <p>Add the eggs, margarine or butter, and honey to the oak mixture. Beat until well combined. Add the oat mixture to the flour mixture. Stir just until combined but still slightly lumpy. (If batter is too thick, thin by adding milk, 1 tablespoon at a time, until desired consistency is reached.)</p>
                     <p>Heat a lightly greased griddle or heavy skillet over medium heat until a few drops of water dance across the surface. For each pancake, pour about 1/4 cup batter onto the hot griddle. Spread batter into a circle about 4 inches in diameter.</p>
                    <p>Cook over medium heat until pancakes are golden brown, turning to cook the second sides when pancake surfaces are bubbly and edges are slightly dry (about 1 to 2 minutes per side).</p>
                    <p>Serve immediately or keep warm in a loosely covered ovenproof dish in a 300 degree F oven. Makes 12 pancakes.</p>
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
                                            <img src="../resources/images/comment_placeholder.jpg" />';

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

                            <form class="form-inline" role="form" action="../php-mysql-login/create_comment.php" method="post">

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
                        <a href="meatballs.php"><img src="../resources/images/Turkey-meatballs.jpg" alt="Meatballs page"></a>
                        </div>
                    </div>
                <div class="col-md-2">
                    <h3>Icecream</h3>
                    <div class="thumbnail">
                        <a href=""><img src="../resources/images/icecream.jpg" alt="Colorful Icecream"></a>
                    </div>
                </div>
                <div class="col-md-2">
                    <h3>BLT Sandwich</h3>
                    <div class="thumbnail">
                        <a href=""><img src="../resources/images/ultimate_BLT_sandwich.jpg" alt="Gorgeous BLT Sandwich"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>