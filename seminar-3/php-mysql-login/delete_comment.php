<?php
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-15
 * Time: 22:18
 */

include_once("session_start.php");
include_once("connection.php");

$page = $_SESSION['page'];

if( isset($_GET['del']) ) {

    $id = $_GET['del'];
    $delete_query = "DELETE FROM comments WHERE id = '$id' ";
    $result = mysqli_query($dbCon, $delete_query) or die("Failed" . mysqli_error());
}

if ($page === 0) {
    header('Location: ../recipes/meatballs.php');
} else{
    header('Location: ../recipes/pancakes.php');
}
