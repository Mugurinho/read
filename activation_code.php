<?php session_start();
include("db_connect.php");
if(isset($_SESSION['Username'])){
	$user_name = $_SESSION['Username'];
}
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
    <title>R.E.A.D. - Activate account</title>
	<link rel="shortcut icon" href="img/Readfavicon.ico"/>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
</head>
<body>
    <div class="brand">R.E.A.D.</div>
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
                <a class="navbar-brand" href="index.php">R.E.A.D. MENU</a>
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
                        <a href="Registration.php">Registration</a>
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
				<b>Welcome, </b><?php echo $_SESSION ['Username'];?>
				<b><?php if(isset($_GET['Registration'])){echo $_GET['Registration']; }?></b>
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">User Account 
                        <strong>Activation Form</strong>
                    </h2>
                    <hr>
                </div>
                   <form role="form" action="activation_codeScript.php" method="POST">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Insert activation code</label>
								<div class="input-group input-group-md">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span> </span>
                                <input type="text" class="form-control" id = "username" name="txtboxCode" placeholder="Enter activation code" maxlength="25" autofocus required>
								</div>
                            <br>
                            <div class="clearfix"></div>
                                <input type="hidden" name="save" value="contact">
                                <button type="submit"  name="Submit" class="btn btn-default">Activate account</button>
								<?php if(isset($_GET['activate'])){echo $_GET['activate']; }?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</body>
</html>