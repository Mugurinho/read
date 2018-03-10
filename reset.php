<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>READ - Reset password</title>
	<link rel="shortcut icon" href="img/Readfavicon.ico"/>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
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
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Reset 
                        <strong>Password</strong>
                    </h2>
                    <hr>
               
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo" title = "Click here for guidance">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          READ reset guide
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
      <p id = "guide">If you forgot your password, you can reset it. By inserting your valid email, you will receive an email notification with a random password. You can then login and change your password from the settings icon.</p>
      </div>
    </div>
  </div>
</div>
                   <form role="form" action="resetScript.php" method="POST">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Insert email</label>
								<div class="input-group input-group-md">
								<span class="input-group-addon">
								<span class="glyphicon glyphicon-envelope"></span> </span>
                                <input type="email" class="form-control" name="txtboxEmail" placeholder="Enter your email" maxlength="30" autofocus required>
								</div>
                            <br>
                            <div class="clearfix"></div>
                                <input type="hidden" name="save" value="contact">
                                <button type="submit"  name="Submit" class="btn btn-default">Submit request</button>
								<b><?php if(isset($_GET['noemail'])){echo $_GET['noemail']; }?></b>
								<b><?php if(isset($_GET['goodemail'])){echo $_GET['goodemail']; }?></b>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
			 </div></div>
<!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Script to Activate the Carousel -->
</body>
</html>