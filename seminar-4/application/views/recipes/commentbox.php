<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="actionBox">
    <ul class="commentList">

        <!-- ko foreach: comments -->
        <li>
            <div class="commenterImage">
                <img src="<?php echo base_url('resources/images/comment_placeholder.jpg') ?> " alt="placeholder picture" />

                <div data-bind="if: canDelete">
                    <a href="">
                        <img data-bind="attr: {id: cid}, text: cid, click: $parent.delComment" src="<?php echo base_url('resources/images/trashcan.png') ?>"
                             alt="trashcan icon"></a>
                </div>
            </div>
            <div class="commentText">
                <p data-bind="text: comment"></p>
                <span data-bind="text: author" class="date sub-text"></span>
            </div>
        </li>
        <!-- /ko -->
    </ul>


    <form class="form-inline" role="form" accept-charset="utf-8">

    <?php
    if ($this->session->userdata('logged_in')) {

        echo
        '<div class="form-group">
            <input data-bind="textInput: commentText" class="form-control" type="text" placeholder="Your comment" name="comment" />
        </div>
        <div class="form-group">
            <button data-bind="click: addComment" class="btn btn-default" type="submit">Post</button>
        </div>';

    } else {

        echo '<div class="form-group">
                <input class="form-control" type="text" placeholder="Log in to comment!"/>
               </div>';
    }
    ?>

    </form>


</div>

<!--- Closing divs needed for recipe (meatballs.php, pancakes.php) pages --->

</div>
</div>
</div>
</div>
