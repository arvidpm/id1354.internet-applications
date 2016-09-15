<?php
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-15
 * Time: 23:04
 */

include_once("session_start.php");

# Destroy session
session_destroy();

echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
