<?php
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-15
 * Time: 22:18
 *
 * delete_comment.php handles deletion of comments by establishing a database connection,
 * fetching page id and comment id, then sending a db query.
 * Page is then refreshed to display comment.
 *
 */

include_once("session_start.php");
include_once("connection.php");

$page = $_SESSION['page'];

if (isset($_GET['del'])) {

    $id = $_GET['del'];
    $delete_query = "DELETE FROM comments WHERE id = '$id' ";
    $result = mysqli_query($dbCon, $delete_query) or die("Failed" . mysqli_error());
}

if ($page === 0) {
    header('Location: ../recipes/meatballs.php');
} else {
    header('Location: ../recipes/pancakes.php');
}
