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
            <li><a href="<?php echo base_url('index.php/calendar') ?>">Calendar</a></li>
            <li><a href="<?php echo base_url('index.php/members/view/signin') ?>">Sign In</a></li>
            <?php if (isset($_SESSION['id'])) {
                echo '<li><a href="php-mysql-login/logged_out.php">Log out</a></li>';
            } ?>
        </ul>
    </div>
</div>