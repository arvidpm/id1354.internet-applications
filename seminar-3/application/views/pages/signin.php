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


    # This is the database query
    $sql = "SELECT * FROM members WHERE username = '$username' LIMIT 1";
    $query = mysqli_query($dbCon, $sql);

    if ($query) {

        $row = mysqli_fetch_row($query);
        $userId = $row[0];
        $dbUsername = $row[1];
        $dbHashPassword = $row[2];

        if ($username == $dbUsername && password_verify($password, $dbHashPassword)) {

            $_SESSION['username'] = $username;
            $_SESSION['id'] = $userId;
            header('Location: ../index.php');
        } else {
            header('Location: signin_failed.php');
        }
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
                        <h3 class="panel-title">Please sign in</h3>
                    </div>
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form" method="post" action="signin.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <div class="signup-style">
                                    <label>Don't have an account? <a href="signup.php">Sign up</a></label>
                                </div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" name="submit"
                                       value="Login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>