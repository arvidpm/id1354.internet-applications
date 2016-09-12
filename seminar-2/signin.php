<!DOCTYPE html>
<!--

To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

    Created on : 2016-sept-12, 18:04:08
    Author     : arvid
-->
<html lang="en">
<head>
    <title>Tasty Recipes - Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="resources/css/reset.css">
    <link rel="stylesheet" href="resources/css/shift.css">
    <link rel="stylesheet" href="resources/css/bootstrap.css">
    <link rel="stylesheet" href="resources/css/main.css">
</head>
<body>
    <div class="jumbotron">
        <div class="container">
            <h1>This. Is. Tasty. RECIPES!</h1>
        </div>
    </div>
    <div class="nav">
        <div class="container">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="calendar.html">Calendar</a></li>
                <li><a href="signin.php">Sign In</a></li>
            </ul>
        </div>
    </div>
    <div class="login-style">
        <div class="container">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please sign in</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Username" name="username" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    		</div>
			    		<div class="signup-style">
			    	    	<label>
			    	    		Don't have an account? <a href="signup.php">Sign up</a>
			    	    	</label>
			    	    </div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
    </div>
</body>
</html>