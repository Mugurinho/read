<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>READ - Registration</title>
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
				<b><?php if(isset($_GET['Registration'])){echo $_GET['Registration']; }?></b>
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">User Registration
                        <strong>Form</strong>
                    </h2>
                    <hr>
                </div>
                    <form role="form" method='post' onsubmit="return validate();" action="RegistrationScript.php" accept-charset='UTF-8'>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Username</label>
								<div class="input-group input-group-md">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span> </span>
                                <input type="text" class="form-control" id="username"  name="txtboxUsername" maxlength="30" pattern=".{6,}" placeholder="Enter a username"  title="Enter 6 or more characters" autofocus required>
								</div>
								<br>
                                <label>Password</label>
								<div class="input-group input-group-md">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span> </span>
                                <input type="password" class="form-control" id="password" name="txtboxPassword" maxlength="40" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Enter a password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
								</div>
								<br>
                                <label>Email</label>
								<div class="input-group input-group-md">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-envelope"></span> </span>
                                <input type="email" class="form-control" id="email" placeholder="example: john@email.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="txtboxEmail" maxlength="30" required>
								</div>
								<div class="clearfix"></div>
								<br>
                                <input type="hidden" name="save" value="contact">
                                <button type="submit" name="Submit" class="btn btn-default">Register</button>
								<b><?php if(isset($_GET['dupliuser'])){echo $_GET['dupliuser']; }?></b>
								<b><?php if(isset($_GET['dupliemail'])){echo $_GET['dupliemail']; }?></b>
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

<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>