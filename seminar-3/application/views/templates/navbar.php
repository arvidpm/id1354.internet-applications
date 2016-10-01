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
            <li><a href="index.php">Home</a></li>
            <li><a href="calendar.php">Calendar</a></li>
            <li><a href="php-mysql-login/signin.php">Sign In</a></li>
            <?php if(isset($_SESSION['id']) ) {
                echo '<li><a href="php-mysql-login/logged_out.php">Log out</a></li>';
            } ?>
        </ul>
    </div>
</div>