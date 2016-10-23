<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="actionBox">
    <ul class="commentList">

        <!-- ko foreach: comments -->
        <li>
            <div class="commenterImage">
                <img src="<?php echo base_url('resources/images/comment_placeholder.jpg') ?> " alt="placeholder picture" />
            </div>
            <div class="commentText">
                <p data-bind="text: comment"></p>
                <span data-bind="text: author" class="date sub-text"></span>
            </div>
        </li>
        <!-- /ko -->

    </ul>



</div>

<!--- Closing divs needed for recipe (meatballs.php, pancakes.php) pages --->

</div>
</div>
</div>
</div>
