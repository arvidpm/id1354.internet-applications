<div class="recipes-list">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="thumbnail">
                    <a href=""><img src="<?php echo base_url('resources/images/Turkey-meatballs.jpg') ?>"
                                    alt="Meatballs page"></a>
                </div>
                <h4>Ingredients</h4>
                <ul>

                </ul>
                <ul>
                    <p>test</p>
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

                            if ($result) {
                                foreach ($result as $row) {

                                    echo
                                        '<li>
                                        <div class="commenterImage">
                                            <img src="' . base_url('resources/images/comment_placeholder.jpg') . '" />';

                                    if (isset($this->session->userdata['logged_in']['id'])) {

                                        if ($this->session->userdata['logged_in']['id'] == $row->user) {
                                            echo 'hello!';
                                        } else {
                                            echo 'false';
                                        }
                                    } else {
                                        echo 'fail';
                                    }

                                    echo
                                        '</div>
                                        <div class="commentText">                                           
                                            <p class="">' . $row->comment . '</p>
                                        </div>
                                    </li>';
                                }
                            }

                            ?>

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
