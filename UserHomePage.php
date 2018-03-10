<?php session_start();
if(isset($_SESSION['Username'])){
		$user_name = $_SESSION['Username'];
}
//if no existing session, user logged out
if(!isset($_SESSION['Username'])){
	header("Location: Login.php");
	return;
	echo $_SESSION['Username'];
}
include("db_connect.php");
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

<div class="container">
	<div class="row">
		<div class="box">
			<b>Welcome,</b>  <?php echo $_SESSION ['Username'];?>
			<div class="col-lg-12 text-center">
				<hr>
					<h2 class="intro-text text-center">User
                        <strong>home page</strong>
                    </h2>
                <hr>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo" title = "Click here for guidance">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          READ guide
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
      <p id = "guide">Welcome to your personal page as reader, user, patient. This is where you can click the Sessions section to open a conversation to your bibliotherapist as well as sharing your personal opinions about read books. Furthermore, you can use the search engine in Books to see the uploaded books to the READ website. For more information about bibliotherapy, please hover your mouse on the bellow image and click the links provided. Please see more guidance on the other pages.</p>
      </div>
    </div>
  </div>
</div>
<div class="carousel-inner">
        <div class="item active">
    <div class="hovereffect">
        <img class="img-responsive img-full" src="img/read1.jpg" title="click me, read me">
            <div class="overlay">
              <h2>More about bibliotherapy</h2>
				<p> 
					> More about bibliotherapy: <a href="http://www.littherapy.com/" target="_blank" >littherapy.com</a><br>
					> Bibliotherapy and mental health: <a href="http://www.tolstoytherapy.com/p/bibliotherapy-recommendations.html" target="_blank">tolstoytherapy.com</a>
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
<!-- main image hover effect style -->
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
  color: #FFF;
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
	<script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Script to Activate the Carousel -->
</body>
</html>