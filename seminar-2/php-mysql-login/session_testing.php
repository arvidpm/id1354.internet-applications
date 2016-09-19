<?php
/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-19
 * Time: 11:05
 */

# Disable error reporting
error_reporting(E_ALL & ~E_NOTICE);

# Start session
session_start();


$value = 4;
$_SESSION['value'] = $value;

echo session_name()."<br>";
echo session_id()."<br>";
echo $_SESSION['value'];

session_unset(); // clear the $_SESSION variable

if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(),'',time()-3600); # Unset the session id
}

session_destroy(); // finally destroy the session
