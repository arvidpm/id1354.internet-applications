<?php

# Setting page where user's at
$_SESSION['page'] = 0;

# Loading recipe data

?>

<div class="recipes-list">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="thumbnail">
                    <a href=""><img src="../../../resources/images/Turkey-meatballs.jpg" alt="Meatballs page"></a>
                </div>
                <h4>Ingredients</h4>
                <ul>

                </ul>
                <ul>

                </ul>
            </div>
            <div class="col-md-5">

            </div>
            <div class="col-md-4">
                <div class="detailBox">
                    <div class="titleBox">
                        <label>Recipe comments</label>
                    </div>
                    <div class="actionBox">
                        <ul class="commentList">

                        </ul>

                        <form class="form-inline" role="form" action="../../../src/php-mysql-login/create_comment.php"
                              method="post">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Log in to comment!"/>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
