<?php session_start();
include("db_connect.php");
	$admin='';
	if(isset($_SESSION['Username'])){
		$admin = $_SESSION['Username'];
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
    <title>READ - Books Upload</title>
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
                <a class="navbar-brand" href="BBTHomePage.php">READ MENU</a>
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
						<a href="BBTChangePass.php"><span title = "change password" class="glyphicon glyphicon-cog"></span></a>
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
			<b>Welcome,</b> <?php echo $_SESSION ['Username'];?> 
			<br>
			<b><?php if(isset($_GET['uploadbooks'])){echo $_GET['uploadbooks']; }?></b>
                <div class="col-lg-12 text-center">
                    <hr>
                    <h2 class="intro-text text-center">Upload
                        <strong>Books</strong>
                    </h2>
                    <hr>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo" title = "Click here for guidance">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Upload Guide
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
       <p id = "guide">On this section, the bibliotherapist can upload books to the database. Every book it is assigned to a genre. All fields are mandatory . After uploading, you will be promted with a screen message. Once uploaded, books can be found inside the Books section.</p>
      </div>
    </div>
  </div>
</div>
</div>
                 <form role="form" method="post" action="BBTUploadBooksScript.php" onsubmit="return validate_books();" enctype="multipart/form-data" accept-charset='UTF-8'>
                            <div class="form-group col-lg-6">
							<label>Book Title</label>
							<div class="input-group input-group-md">
								  <span class="input-group-addon">
									<span class="glyphicon glyphicon-pencil"></span>
								  </span>
								<input type="text" name="txtboxTitle" class="form-control" autofocus required/>
								</div>
							<br>
								<label>Description</label>
								<textarea rows="4" cols="50" class="form-control" placeholder="Book description (maximum 500 letters)..." maxlength = "500" id="feedback" name="txtboxDescription" required/></textarea>
							<br>
                                <label>Book Genre</label>
								<div class="input-group input-group-md">
								  <span class="input-group-addon">
									<span class="glyphicon glyphicon-list"></span>
								  </span>
									<select class="form-control" id="genre" name="selectGenre" required>
									  <option value="motivation">Motivation</option>
									  <option value="depression">Depression</option>
									  <option value="mood boost">Mood boost</option>
									  <option value="stress">Stress</option>
									  <option value="addiction">Addiction</option>
									</select>
									</div>
							<br>
                                <label>Book File</label>
								<div class="input-group input-group-md">
								  <span class="input-group-addon">
									<span class="glyphicon glyphicon-book"></span>
								  </span>
								 <input name="userfile" type="file" id="userfile" accept="application/pdf" class="form-control" required/>
								</div>
							<br>
                                <label>Book Cover</label>
								<div class="input-group input-group-md">
								  <span class="input-group-addon">
									<span class="glyphicon glyphicon-camera"></span>
								  </span>
								<input type="file" name="image" id="image" accept="image/gif, image/jpeg, image/png, image/gif, image/jpg" class="form-control" required/>
								</div>
							<br>
                                <button type="submit" name="Upload" class="btn btn-default"><span class="glyphicon glyphicon-upload"></span>&nbsp&nbspUpload files</button>
                            </div>
                        </div>
                    </form>
                 </div>
 <div class="row">
	<div class="box">
		<div class="col-lg-12">
			<footer>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h5>
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