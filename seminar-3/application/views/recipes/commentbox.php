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
