<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="actionBox">
    <ul class="commentList">
        <?php

        if ($result) {

            $session = $this->session->userdata('logged_in');

            foreach ($result as $row) {

                echo '<li><div class="commenterImage"><img src=" ' . base_url('resources/images/comment_placeholder.jpg') . '  " alt="placeholder picture" />';

                if ($session['id'] == $row->id) {
                    ?>

                    <a href="<?php echo base_url('Comments/delComment/' . $row->id . '/' . $row->cid); ?>"><img
                            src="<?php echo base_url('resources/images/trashcan.png') ?>" alt="trashcan icon"></a>

                    <?php
                }

                echo
                    '</div>
                     <div class="commentText">                                           
                     <p>' . $row->comment . '</p>
                     <span class="date sub-text">' . $row->username . '</span>
                     </div>
                     </li>';
            }
        } else {
            echo '<p>Inga kommentarer ännu!</p>';
        }
        ?>

    </ul>

    <?php
    $session = $this->session->userdata('logged_in');

    $attributes = array('class' => 'form-inline', 'role' => 'form');
    $hidden = array('site' => $site, 'membersid' => $session['id']);

    echo form_open('Comments/addComment', $attributes, $hidden);

    if ($session) {

        echo
        '<div class="form-group">
            <input class="form-control" type="text" placeholder="Your comment" name="comment" />
        </div>
        <div class="form-group">
            <button class="btn btn-default">Post</button>
        </div>';


    } else {

        echo '<div class="form-group">
                <input class="form-control" type="text" placeholder="Log in to comment!"/>
               </div>';
    }

    echo form_close();

    $cv_error = $this->session->flashdata('validation_errors_comments');

    if (isset($cv_error))
        echo '<span class="validation_error">' . $cv_error . '</span>';

    ?>
</div>

<!--- Closing divs needed for recipe (meatballs.php, pancakes.php) pages --->

</div>
</div>
</div>
</div>
