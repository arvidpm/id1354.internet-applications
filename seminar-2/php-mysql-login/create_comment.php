<?php
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-16
 * Time: 12:54
 *
 * create_comment.php handles creation of comments by establishing a database connection,
 * fetching page id, user id and comment content and sending a query.
 * Page is then refreshed to display comment.
 *
 */

include_once("session_start.php");
include_once("connection.php");

$page = $_SESSION['page'];
$user = $_SESSION['id'];
$comment = strip_tags($_POST['comment']);

$create_query = "INSERT INTO comments (user, comment, page) VALUES ('$user', '$comment', '$page')";
$result = mysqli_query($dbCon, $create_query) or die("Failed" . mysqli_error());


if ($result && $page === 0) {
    header('Location: ../recipes/meatballs.php');
} else {
    header('Location: ../recipes/pancakes.php');
}

