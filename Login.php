<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>READ - Login</title>
	<link rel="shortcut icon" href="img/Readfavicon.ico"/>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
	<script src="js/validation.js" type="text/javascript"> </script>
</head>
<body>
    <div class="brand">READ</div>
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.php">READ MENU</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                     <li>
                        <a href="index.php">Home</a>
                    </li>
					<li>
                        <a href="Login.php">Login</a>
                    </li>
                    <li>
                        <a href="Registration.php">Sign Up</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="box">
			<b><?php if(isset($_GET['logout'])){echo $_GET['logout']; } ?></b>
			<b><?php if(isset($_GET['success'])){echo $_GET['success']; }?></b>
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">User Login
                        <strong>Form</strong>
                    </h2>
                    <hr>
                </div>
                   <form role="form" action="LoginScript.php" method="POST">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Username</label>
								<div class="input-group input-group-md">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span> </span>
                                <input type="text" class="form-control" id = "username" name="txtboxUsername" placeholder="Enter a username" maxlength="30" onsubmit="return login();" autofocus required>
								</div>
                            <br>
                                <label>Password</label>
								<div class="input-group input-group-md">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span> </span>
                                <input type="password" class="form-control" id = "password" name="txtboxPassword" placeholder="Enter a password" maxlength="40" required>
								</div>
                            <br>
							<!-- login, activate account and reset password -->
                            <div class="clearfix"></div>
                                <input type="hidden" name="save" value="contact">
                                <button type="submit"  name="Submit" class="btn btn-default">Login</button>&nbsp&nbsp or Activate your account <a href = "activation_code.php">here</a><br><br>
								<b><?php if(isset($_GET['incorrect'])){echo $_GET['incorrect']; }?></b>
								<a href = "reset.php">Forgot password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
<div class="row">
	<div class="box">
		<div class="col-lg-12">
			<footer>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h5>
								<a href="About.php">About READ</a> |
								<a href="Contact.php">Contact</a> </h5>
								<h6>Copyright &copy; Mugurel 2016<h6>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
	</div>
<!-- menu js -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>