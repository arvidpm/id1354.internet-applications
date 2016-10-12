<div class="actionBox">
    <ul class="commentList">
        <?php
         /*
          * ---------------- Members data -----------------
          * $this->session->userdata('logged_in') contains:
          *
          * 'id' = members id
          * 'username'  = members username
          *
          * ----------------- Recipe data -----------------
          *
          * 'recipe' => $page = 'meatballs' or 'pancakes'
          * 'result' = comments array
          * 'site' = 0 for meatballs, 1 for pancakes
          *
          * */

        if ($result) {

            $session = $this->session->userdata('logged_in');

            foreach ($result as $row) {

                echo'<li><div class="commenterImage"><img src=" '. base_url('resources/images/comment_placeholder.jpg') .'  " alt="placeholder picture" />';

                if ($session['id'] == $row->id)
                {
                    ?>

                    <a href="<?php echo base_url('Comments/delComment/'. $row->cid); ?>"><img src="<?php echo base_url('resources/images/trashcan.png') ?>" alt="trashcan icon"></a>

                    <?php
                }
                
                echo
                    '</div>
                     <div class="commentText">                                           
                     <p class="">' . $row->comment . '</p>
                     <span class="date sub-text">'.$row->username.'</span>
                     </div>
                     </li>';
            }
        } else { echo '<p class="Inga kommentarer ännu!"></p>'; }
        ?>

    </ul>

    <?php
    $session = $this->session->userdata('logged_in');

    $attributes = array('class' => 'form-inline', 'role' => 'form');
    $hidden = array('site' => $site, 'membersid' => $session['id']);

    echo form_open('Comments/addComment', $attributes, $hidden);

     if ($session['id']){

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

    $vec = $this->session->flashdata('validation_errors_comments');

    ?>
</div>

<!--- Closing divs needed for recipe (meatballs.php, pancakes.php) pages --->

</div>
</div>
</div>
</div>
