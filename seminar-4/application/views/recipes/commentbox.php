<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="actionBox">
    <ul class="commentList">

        <!-- ko foreach: comment -->
        <div class="comment">
            <img src="<?php echo base_url('resources/images/comment_placeholder.jpg') ?>" alt="placeholder picture">
            <p>Comment <p data-bind="text: comment"></p></p>
            <hr/>
        </div>
        <!-- /ko -->

    </ul>






    <?php
    $session = $this->session->userdata('logged_in');

    echo '<form>';
    if ($session) {

        echo
        '<div class="form-group">
            <input class="form-control" type="text" placeholder="Your comment" name="comment" data-bind="textInput: commentText"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" data-bind="click: addComment" type="submit">Post</button>
        </div>';

    } else {

        echo '<div class="form-group">
                <input class="form-control" type="text" placeholder="Log in to comment!"/>
               </div>';
    }

    echo '</form>';

    ?>

</div>

<!--- Closing divs needed for recipe (meatballs.php, pancakes.php) pages --->

</div>
</div>
</div>
</div>
