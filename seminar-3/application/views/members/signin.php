<div class="login-style">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please sign in</h3>
                    </div>
                    <div class="panel-body">

                        <?php $attributes = array('id' => 'login_form');
                        echo form_open('Members/get_member', $attributes); ?>
                        <form accept-charset="UTF-8" role="form" method="post" action="signin.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <div class="signup-style">
                                    <label>Don't have an account? <a
                                            href="<?php echo base_url('index.php/members/view/signup') ?>">Sign up</a></label>
                                </div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" name="submit"
                                       value="Login">
                            </fieldset>
                            <?php
                            echo form_close();

                            $ve = $this->session->flashdata('validation_errors');

                            if(isset($ve))
                                echo '<br><span class="validation_error">'.$ve.'</span>';

                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>