<?php session_start();
include("db_connect.php");
if(isset($_SESSION['Username'])){
		$user_name = $_SESSION['Username'];
	}
	//if no existing session, user logged out
	if(!isset($_SESSION['Username'])){
		header("Location: Login.php");
		return;
		echo $_SESSION['Username'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>READ - Stories</title>
	<link rel="shortcut icon" href="img/Readfavicon.ico"/>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="js/jquery.tablesorter.pager.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.tablesorter.pager.js"></script> 
	<script src="js/jquery-metadata.js"></script> 
	<script src="js/jquery-1.12.0.min.js"></script> 
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
                  <a class="navbar-brand" href="UserHomePage.php">READ MENU</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                     <li>
                        <a href="BBTHomePage.php">Home</a>
                    </li>
					<li>
                        <a href="BBTFeedback.php">Sessions</a>
                    </li>
					<li>
                        <a href="BBTUploadBooks.php">Upload books</a>
                    </li>
					<li>
                        <a href="Logout.php">Log out</a>
                    </li>
					<li>
						<a href="BBTChangePass.php"><span title = "change password" class="glyphicon glyphicon-cog" class = "glyphicon glyphicon-pencil"></span></a>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	   <!--container starts here-->
     <div class="container">
        <div class="row">
            <div class="box">
			<b>Welcome, </b>  <?php echo $_SESSION ['Username'];?>
			   <!--not to be moved above-->
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Change
                        <strong>Password</strong>
                    </h2>
                    <hr>
<form role="form" method="post" action="BBTChangePassScript.php" enctype="multipart/form-data" accept-charset='UTF-8'>
<div class="row">
<div class="form-group col-lg-4">
<label>Current password</label>
	<div class="input-group input-group-md">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-lock"></span> </span>
    <input type="password" class="form-control" id="password" name="oldpassword" maxlength="40" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Enter the current password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
</div>
<br>
<label>New password</label>
	<div class="input-group input-group-md">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-lock"></span> </span>
    <input type="password" class="form-control" id="password" name="newpassword" maxlength="40" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Enter a new password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
</div>				
</div>
</div>
    <button type="submit" name="Submit" class="btn btn-default"><span class="glyphicon glyphicon-ok"></span>&nbsp&nbspUpdate</button>
	<b><?php if(isset($_GET['nopass'])){echo $_GET['nopass']; }?></b>
	<b><?php if(isset($_GET['newpass'])){echo $_GET['newpass']; }?></b>
</form>
</style>
</div>
</div>
</div>
<div class="row">
	<div class="box">
		<div class="col-lg-12">
			<footer>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
								<h6>Copyright &copy; Mugurel 2016<h6>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
	</div>
</div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Script to Activate the Carousel -->
</body>
</html>