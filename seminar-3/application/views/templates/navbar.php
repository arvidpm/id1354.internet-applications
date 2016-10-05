<?php
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-30
 * Time: 15:44
 */
?>

<div class="nav">
    <div class="container">
        <ul>
            <li><a href="<?php echo base_url() ?>">Home</a></li>
            <li><a href="<?php echo base_url('calendar') ?>">Calendar</a></li>
            <?php
            if ($this->session->userdata('logged_in')) {

                $session_data = $this->session->userdata('logged_in');

                echo '<li><a href="' . base_url("members/logout") . '">Log out</a>';

            } else {
                echo '<li><a href="' . base_url('members/view/signin') . '">Sign In</a></li>';

            }
            ?>

        </ul>
    </div>
</div>