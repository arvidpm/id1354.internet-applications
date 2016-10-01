<?php

# Setting page where user's at
$_SESSION['page'] = 0;

# Loading recipe data

$data =

?>

    <div class="recipes-list">
        <div class="container">
            <?php echo $data['xmlresult']?>
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
    </div>
