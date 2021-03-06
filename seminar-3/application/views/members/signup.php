<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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

                        <?php echo form_open('Members/create_member'); ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username (max 20 chars)" name="username"
                                           type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Choose a strong password" name="password"
                                           type="password">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Repeat password" name="re-password"
                                           type="password">
                                </div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" name="submit"
                                       value="Register">
                            </fieldset>
                        <?php echo form_close();

                        $ve = $this->session->flashdata('validation_errors');

                        if(isset($ve))
                            echo '<div class="signup-style"><label>' .$ve . '</label> </div>' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>