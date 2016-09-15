<?php

/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-14
 * Time: 18:47
 */

include_once("../php-mysql-login/session_start.php");
include_once("../php-mysql-login/connection.php");

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
    <title>Tasty Recipes - Meatballs recipe</title>
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
            <h2>Turkey Meatballs</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="thumbnail">
                        <a href=""><img src="../resources/images/Turkey-meatballs.jpg" alt="Meatballs page"></a>
                    </div>
                    <h4>Ingredients</h4>
                    <ul>
                        <li>1 small onion, grated</li>
                        <li>3 garlic cloves, minced</li>
                        <li>1 large egg</li>
                        <li>1/4 cup dried bread crumbs</li>
                        <li>3 tablespoons ketchup</li>
                        <li>1/4 cup chopped fresh Italian parsley leaves</li>
                        <li>1/4 cup grated Parmesan</li>
                        <li>1/4 cup grated Pecorino Romano</li>
                        <li>1 teaspoon salt</li>
                        <li>1/4 teaspoon ground black pepper</li>
                        <li>1 pound ground dark turkey meat</li>
                        <li>3 tablespoons olive oil</li>
                    </ul>
                    <h4>Nutrition summary (calorie breakdown)</h4>
                    <ul>
                    <li>26% fat</li>
                    <li>19% carbs</li>
                    <li>55% protein</li>   
                    </ul> 
                    <p>There are 42 calories in 1 medium Turkey Meatball.</p>
                </div>
                <div class="col-md-5">
                    <h4>Directions</h4>
                    <p>Add the onion, garlic, egg, bread crumbs, ketchup, parsley, Parmesan, Pecorino, salt and pepper to a large bowl and blend. Mix in the turkey. Shape the turkey mixture into 1 1/4-inch-diameter meatballs. Place on a large plate or baking sheet.</p>
                    <p>Heat the oil in a heavy large frying pan over medium-high heat. Add the meatballs and saute until browned on all sides, about 5 minutes. Turn off heat. Transfer the meatballs to a plate. Pour off any excess oil. Add the marinara sauce, about 3 cups. Return all the meatballs to the pan. Turn the heat to medium-low and simmer until the sauce thickens slightly and the flavors blend, 15 to 20 minutes. Season the sauce, to taste, with salt and pepper.</p>
                    <p>Transfer the meatball mixture to a serving bowl. Serve with toothpicks.</p>
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
                                $comments_query = "SELECT * FROM comments";
                                $comments_result = mysqli_query($dbCon, $comments_query);

                                while ($row = mysqli_fetch_array($comments_result)) {
                                    $user = $row[1];
                                    $comment = $row[2];

                                    # Query for getting username related to comment
                                    $user_query = "SELECT username FROM id1354.members WHERE id = '$user' LIMIT 1";
                                    $user_result = mysqli_query($dbCon, $user_query);
                                    $row1 = mysqli_fetch_array($user_result);

                                    echo

                                    '<li>
                                        <div class="commenterImage">
                                            <img src="../resources/images/comment_placeholder.jpg" />
                                        </div>
                                        <div class="commentText">
                                            <p class="">'. $comment .'</p><span class="date sub-text">'. $row1['username'] .'</span>
                                        </div>
                                    </li>';
                                }

                                ?>

                                <li>
                                    <div class="commenterImage">
                                        <img src="../resources/images/comment_placeholder.jpg" />
                                    </div>
                                    <div class="commentText">
                                        <p class="">Hello this is a test comment. Hello this is a test comment. Hello this is a test comment. Hello this is a test comment. Hello this is a test comment. Hello this is a test comment. </p><span class="date sub-text">Delete comment</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="commenterImage">
                                        <img src="../resources/images/comment_placeholder.jpg" />
                                    </div>
                                    <div class="commentText">
                                        <p class="">Hello this is a test comment. Hello this is a test comment. Hello this is a test comment. </p><span class="date sub-text">Delete comment</span>

                                    </div>
                                </li>





                            </ul>
                            <form class="form-inline" role="form">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Your comments" />
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-default">Post</button>
                                </div>
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
                        <h3>Pancakes</h3>
                        <div class="thumbnail">
                        <a href="pancakes.php"><img src="../resources/images/AppleOatPancakes_DT.jpg" alt="Honey Oat Pancakes"></a>
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