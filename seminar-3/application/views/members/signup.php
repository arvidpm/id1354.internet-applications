<?php

/**
 * Created by PhpStorm.
 * User: arvid
 * Date: 2016-09-14
 * Time: 10:59
 */
/*
include_once("session_start.php");

# If user presses submit
if ($_POST['submit']) {

    include_once("connection.php");
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

    # Hashes password
    $dbHashPassword = password_hash($password, PASSWORD_DEFAULT);

    # This is the database query
    $sql = "INSERT INTO members (username, password) VALUES ('$username','$dbHashPassword')";
    $query = mysqli_query($dbCon, $sql);

    if ($query) {
        header('Location: registration_success.php');
    } else {
        header('Location: registration_failed.php');
    }

}
*/
?>

<div class="login-style">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register user</h3>
                    </div>
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form" method="post" action="signup.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Choose your username" name="username"
                                           type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Choose a strong password" name="password"
                                           type="password">
                                </div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" name="submit"
                                       value="Register">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>