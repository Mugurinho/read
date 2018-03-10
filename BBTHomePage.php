<?php session_start();
if(isset($_GET['Message'])){
    echo $_GET['Message']; //successful message in case login details are correct, user redirected to this page through $LoginMessage variable
}
include("db_connect.php");//we always need a database connection
if(isset($_SESSION['Username'])){
		$admin = $_SESSION['Username'];
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
    <title>READ - Home</title>
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
			<b>Welcome,</b>  <?php echo $_SESSION ['Username'];?>
			<div class="col-lg-12 text-center">
				<hr>
					<h2 class="intro-text text-center">Bibliotherapist
                        <strong>home page</strong>
                    </h2>
                <hr>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo" title = "Click here for guidance">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          READ Guide
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
      <p id = "guide">Welcome to your personal page as bibliotherapist. You can see the books uploaded and use the search engine on this page, by genre, title or show all. You can hover the image to click on the provided links in order to stay up to date with bibliotherapy. In the Sessions page you can read and send messages to your patients and you can also select a book to send to a patient. You can upload books as pdf type to the database in the Upload Books page. Please see more guidance on the other pages.</p>
      </div>
    </div>
  </div>
</div>
<form action="" method="GET">
				<div class="form-group col-lg-8">
				<input name="searchbox" type="search" class="form-control" placeholder="type here" autofocus required>
				</div>
				<div class="form-group col-lg-2">
				<select class="form-control" name="select">
				<option value="genre">search by genre</option>
				<option value="title">search by title</option>
				<option value="all">show all</option>
				</select>
				</div>
				<div class="form-group col-lg-2">
				<input type="submit" class="form-control" name="Search" value="Search">
				</div>
</form>

<?php
include("db_connect.php");
//code has been borrowed and adapted from https://www.youtube.com/watch?v=a8nC3AdHNtQ
	if(isset($_GET["Search"]) && isset($_GET["select"])){
		$search_value = $_GET['searchbox'];
		$searchBy = $_GET['select'];
		$search_value = preg_replace("#[^0-9 a-z]#i", "", $search_value);
		if(empty($_GET['searchbox'])){  
			echo "Please insert a keyword";
			echo "<script>alert('Please insert a keyword')</script>"; 
			exit;
		}
$per_page = 2; 
if (isset($_GET["page"])){ 
	$page = $_GET["page"];
}
else{
	$page = 1;
}
$start_from = ($page-1) * $per_page;
if(isset($_GET["select"]) && $searchBy == 'genre'){
		$query = mysqli_query($conn, "SELECT * from ReadBooks WHERE Genre LIKE '%$search_value%' LIMIT $start_from, $per_page"); 
		$result = mysqli_num_rows($query);
		if($result == 0){
			echo "<h6 id='red'>There are no search results</h6>";
		}
		else{
		while($row = mysqli_fetch_array($query)){
			$genre = $row['Genre'];
			$bookid = $row['ID'];
			$image = $row['Image'];
			$title = $row['Title'];
			echo "<a href ='BBTDetails.php?bookid=$bookid'/><img id='preview' title = '$title' src='BBTBooklistScript.php?bookid=$bookid'/></a>";
		}
		}
}
else if(isset($_GET["select"]) && $searchBy == 'title'){
		$query = mysqli_query($conn, "SELECT * from ReadBooks WHERE Title LIKE '%$search_value%' LIMIT $start_from, $per_page"); 
		$result = mysqli_num_rows($query);
		if($result == 0){
			echo "<h6 id='red'>There are no search results</h6>";
		}
		else{
		while($row = mysqli_fetch_array($query)){
			$genre = $row['Genre'];
			$bookid = $row['ID'];
			$image = $row['Image'];
			$title = $row['Title'];
			echo "<a href ='BBTDetails.php?bookid=$bookid'/><img id='preview' title = '$title' src='BBTBooklistScript.php?bookid=$bookid'/></a>";
		}
		}
}
else if(isset($_GET["select"]) && $searchBy == 'all'){
		$query = mysqli_query($conn, "SELECT * from ReadBooks WHERE Genre LIKE '%$search_value%' OR Title LIKE '%$search_value%' LIMIT $start_from, $per_page"); 
		$result = mysqli_num_rows($query);
		if($result == 0){
			echo "<h6 id='red'>There are no search results</h6>";
		}
		else{
		while($row = mysqli_fetch_array($query)){
			$genre = $row['Genre'];
			$bookid = $row['ID'];
			$image = $row['Image'];
			$title = $row['Title'];
			echo "<a href ='BBTDetails.php?bookid=$bookid'/><img id='preview' title = '$title' src='BBTBooklistScript.php?bookid=$bookid'/></a>";
		}
		}
}
		$query = "SELECT * from ReadBooks where Title LIKE '%$search_value%' or Genre LIKE '%$search_value%'";
		$result = mysqli_query($conn, $query);
		$total_records = mysqli_num_rows($result);
		$total_pages = ceil($total_records / $per_page);
		echo "<center><br><a href='BBTHomePage.php?searchbox=$search_value&select=$searchBy&Search=Search&page=1'><button type='button' class='btn btn-default btn-xs' type='submit'>".'First Page'."</button></a>&nbsp&nbsp";
		for ($i=1; $i<=$total_pages; $i++){
		echo "<a href='BBTHomePage.php?searchbox=$search_value&select=$searchBy&Search=Search&page=".$i."'><button type='button' class='btn btn-default btn-xs' type='submit'>".$i."</button></a>&nbsp&nbsp";
		}
		echo "<a href='BBTHomePage.php?searchbox=$search_value&select=$searchBy&Search=Search&page=$total_pages'><button type='button' class='btn btn-default btn-xs' type='submit'>".'Last Page'."</button></a></center><br>";
}
mysqli_close($conn);
?>
<style>
#preview{
	height:250px;
	width:200px; 
	float:center;
	border-width:1px;	
    border-style:solid;
	border-radius:5px;
	border-color:lightgrey;
	padding: 8px;
	margin:2%;
}
#preview:hover {
border-color:#43A0FA;
}
</style>
<div class="carousel-inner">
  <div class="item active">
    <div class="hovereffect">
        <img class="img-responsive img-full" src="img/bookreading.jpg" title="click me, read me">
            <div class="overlay">
              <h2>More about bibliotherapy</h2>
				<p> 
					> More about bibliotherapy: <a href="http://www.littherapy.com/" target="_blank">littherapy.com</a><br>
					> Bibliotherapy and mental health: <a href="http://www.tolstoytherapy.com/p/bibliotherapy-recommendations.html" target="_blank">tolstoytherapy.com</a><br>
				</p> 
</div>
</div>
</div>
</div>
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
<style>
.hovereffect {
  width: 100%;
  height: 100%;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
  background: -webkit-linear-gradient(45deg, #ff89e9 0%, #05abe0 100%);
  background: linear-gradient(45deg, #ff89e9 0%,#05abe0 100%);
}

.hovereffect .overlay {
  width: 100%;
  height: 100%;
  position: absolute;
  overflow: hidden;
  top: 0;
  left: 0;
  padding: 3em;
  text-align: left;
}

.hovereffect img {
  display: block;
  position: relative;
  max-width: none;
  width: calc(100% + 60px);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
  transition: opacity 0.35s, transform 0.45s;
  -webkit-transform: translate3d(-40px,0,0);
  transform: translate3d(-40px,0,0);
}

.hovereffect h2 {
  text-transform: uppercase;
  color: #fff;
  position: relative;
  font-size: 17px;
  background-color: transparent;
 padding: 5% 0 10px 0;
  text-align: left;
}

.hovereffect .overlay:before {
  position: absolute;
  top: 20px;
  right: 20px;
  bottom: 20px;
  left: 20px;
  border: 1px solid #fff;
  content: '';
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
  transition: opacity 0.35s, transform 0.45s;
  -webkit-transform: translate3d(-20px,0,0);
  transform: translate3d(-20px,0,0);
}

.hovereffect a, .hovereffect p {
  color:#FFF;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
  transition: opacity 0.35s, transform 0.45s;
  -webkit-transform: translate3d(-10px,0,0);
  transform: translate3d(-10px,0,0);
}

.hovereffect:hover img{
  opacity: 0.6;
  filter: alpha(opacity=60);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}
.hovereffect:hover .overlay:before,
.hovereffect:hover a, .hovereffect:hover p {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}
</style>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Script to Activate the Carousel -->
</body>
</html>