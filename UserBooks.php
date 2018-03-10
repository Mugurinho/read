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
                        <a href="UserHomePage.php">Home</a>
						</li>
						<li>
							<a href="UserFeedback.php">Sessions</a>
						</li>
						<li>
							<a href="UserBooks.php">Books</a>
						</li>
						<li>
							<a href="Logout.php">Log out</a>
						</li>
						<li>
							<a href="UserChangePass.php"><span title = "change password" class="glyphicon glyphicon-cog"></span></a>
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
                    <h2 class="intro-text text-center">Book
                        <strong>List</strong>
                    </h2>
                    <hr>
	 <!--start of the section page content-->
<div class="table-responsive">
	<table class='tablesorter table table-bordered'>             
		<thead>
			<tr> 
				<th>Details</th> 
				<th>Sort by title</th>
				<th>Sort by genre</th> 
			</tr>
		</thead> 
	<tbody> 
<tr>
<!--table list-->
<?php
$per_page = 4; 
if (isset($_GET["page"])){ 
	$page = $_GET["page"];
}
else{
	$page = 1;
}
$start_from = ($page-1) * $per_page;
		$query = "SELECT * from ReadBooks LIMIT $start_from, $per_page";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)){
			$genre = $row['Genre'];
			$title = $row['Title'];
			$bookid = $row['ID'];
			$image = $row['Image'];
?>  
			<td><?php echo "<a href ='Details.php?bookid=$bookid'/><img title = '$title' src='BBTBooklistScript.php?bookid=$bookid'/></a>"?></td> 
			<td><?php echo $title?></td> 
			<td><?php echo $genre?></td> 
</tr> 	
<?php
}
?>
</tbody> 
</table>
</div>
<?php
$count = mysqli_num_rows($result);
$a = $count/2;
$a = ceil($a);
for($b=1; $b<=$a; $b++){
	?><a href = "UserBooks.php?page=<?php echo $b?>" style="text-decoration:none"><?php echo " page" . $b . "&nbsp&nbsp" ;?></a><?php
}
?>
<style>
img{
	height:200px;
	width:150px;
	float:center;
}
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
	<script>
	$(document).ready(function() { 
    // call the tablesorter plugin 
    $("table").tablesorter({ 
        // sort on the first column and third column, order asc 
        sortList: [[0,0],[2,0]] 
    }); 
}); 
</script>
<script type="text/javascript" src="js/jquery-latest.js"></script> 
<script type="text/javascript" src="js/jquery.tablesorter.js"></script> 
<script type="text/javascript" src="js/jquery.tablesorter.pager.js"></script> 
</body>
</html>