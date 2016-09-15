<?php
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-15
 * Time: 22:18
 */

include_once("session_start.php");
include_once("connection.php");

if( isset($_GET['del']) ) {

    $id = $_GET['del'];
    $delete_query = "DELETE FROM comments WHERE id = '$id' ";
    $result = mysqli_query($dbCon, $delete_query) or die("Failed" . mysqli_error());
    echo "<meta http-equiv='refresh' content='0;url=../recipes/meatballs.php'>";
}
