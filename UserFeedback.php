<?php session_start();
include("db_connect.php");//we always need a database connection
if(isset($_GET['Message'])){
    echo $_GET['Message']; //successful message in case login details are correct, user redirected to this page through $LoginMessage variable
}
if(isset($_SESSION['Username'])){
	$user_name = $_SESSION['Username'];
}
if(!isset($_SESSION['Username'])){
		header("Location: Login.php");
		return;
		echo $_SESSION['Username'];
	}
?>
<!DOCTYPE html><html lang="en">
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
				</div><!--end navbar header-->
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
					</div><!--end navbar-collapse-->
				</div><!-- /.container -->
			</nav>
<div class="container">
	<div class="row">
		<div class="box">
			<b>Welcome, </b>  <?php echo $_SESSION ['Username'];?>
				<div class="col-lg-12 text-center">
					<hr>
					<h2 class="intro-text text-center">BIBLIOTHERAPY 
					<strong>SESSIONS</strong>
					</h2>
					<hr>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo" title = "Click here and read me!">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Session guide
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
      <p id = "guide">
	  Welcome to your session feedback page as reader, user, patient. This is where you can read and submit messages to your bibliotherapist. Please note that on the left hand side is a list with registered bibliotherapists. Usually, you would have a therapist to whom you can write, selecting from the registered therapists and clicking the Messages button. In the session section, you can also receive a book from your bibliotherapist which you can read, once your condition has been acknowledged. As well, you can check the Books section to see the uploaded books to the READ website. Please see more guidance on the other pages.</p>
      </div>
    </div>
  </div>
</div>
<?php 
include("db_connect.php");
//code has been borrowed and adapted for READ from: https://www.youtube.com/watch?v=UzE3oQeKcDI&list=PLGCjwl1RrtcTGL5NPycrOunRsWGquHi_k 
if(isset($_GET['user']) && !empty($_GET['user'])){//this code display messages ok//no table responsive div yet 
		echo "<center><table class ='table'>
		<tr> 
		<th><b>USERS</b></th>
		<th><b>MESSAGE </b></th> 
		<th><b>DATE</b></th> 
		<th><b>BOOK</b></th> 
		</tr>"; 
	$user = $_GET['user'];
	$user2 = $_SESSION['Username'];//query for user 2 
	$list = mysqli_query($conn, "select * from ReadUsers where Username = '$user2'");
	while($setAdmin = mysqli_fetch_array($list)){
	$user2 = $setAdmin['UserID']; //this code displays the admin ID
	}
	$display_message = mysqli_query($conn, "select * from ReadMessages where FromID = '$user' AND ToID = '$user2' OR FromID = '$user2' AND ToID = '$user' ORDER BY Date DESC LIMIT 10");//limit to 6 records
	while($row = mysqli_fetch_array($display_message)){
		$user_name = $_SESSION['Username'];
		$user_name = $row['ToID'];
		$date = $row['Date'];
		$from_id = $row['FromID'];
		$to_id = $row['ToID'];
		$read_message = $row['Message'];
		$user_name = $_SESSION['Username'];
		$user_query = mysqli_query($conn, "select * from ReadUsers where UserID = '$from_id'");
		$run_user = mysqli_fetch_array($user_query);
		$email = $run_user['Email'];//no longer needed
		$from_username = $run_user['Username'];
		$book_name = $row['Book'];
		//pdf book link to read
		$query = "SELECT * FROM ReadBooks where FileName = '$book_name' ";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)){
			$bookid = $row['ID'];
		}
			echo "<tr>"; 
			echo "<td>" . $from_username . "</td>"; 
			echo "<td>" . $read_message . "</td>";
			echo "<td>" . $date . "</td>";
			if($book_name)//avoid erors in case no book is selected
			echo "<td>" . "<a href ='BBTBookScript.php?bookid=$bookid'/>$book_name</a>" . "</td>";
			else echo "<td>" . '-'. "</td>";
			echo "</tr>";
}
		echo "</table></center></div>";
?>
<br/>
<form role="form" method="post" action="" enctype="multipart/form-data" accept-charset='UTF-8'>
 <?php
	if(isset($_POST['txtboxFeedback'])){
		$email = $_POST['txtboxEmail'];
		$date = date('Y-m-d H:i:s');
		$user = $_GET['user'];
		$message = $_POST['txtboxFeedback'];
		$userList = mysqli_query($conn, "select UserID, Username, Role from ReadUsers where Username = '$user_name'");
		while($runUser = mysqli_fetch_array($userList)){
		$user_name = $runUser['UserID']; //this code displays the user ID
		$email_List = mysqli_query($conn, "select * from ReadUsers where Username = '$user_name'");//modify for emails if case
		while($emailUser = mysqli_fetch_array($email_List)){
		$email = $user;
		}
		mysqli_query($conn, "insert into ReadMessages(FromID, ToID, Message, Date) Values ('$user_name', '$user', '$message', '$date')");
		$user_name = $_SESSION['Username'];
		echo '<meta http-equiv="Refresh" content="0";url=UserFeedback.php>';
		$to = $email;
		$subject = "New message from READ";
		$headers = "From: mb9065d@greenwich.ac.uk";
		$body = "New message has been added by $user_name.\n To see message please login at: http://read.16mb.com/Login.php";
			if(!mail($to, $subject, $body, $headers))
			echo"We couldn't sign you up now. Please try again.";
		}
}
?>
<div class="form-group col-lg-12">
	<label>Enter your message</label>
		<textarea rows="4" cols="50" class="form-control" placeholder="Type your message here (maximum 500 letters)..." maxlength = "500" id="feedback" name="txtboxFeedback" autofocus required/></textarea><br>
<?php
$userMail = mysqli_query($conn, "select * from ReadUsers where UserID = '$user'");
while($runMail = mysqli_fetch_array($userMail)){
$email = $runMail['Email'];
}
?>
<input type="hidden" class="form-control" id="email" value = "<?php echo $email ?>" name="txtboxEmail" maxlength="25">
    <button type="submit" name="Submit" class="btn btn-default"><span class="glyphicon glyphicon-send"></span>&nbsp&nbspSend message</button>
</form>
<style>
table {
    border-collapse: collapse;
    width: 100%;
	border: 1px solid #ddd;
}
th, td {
    padding: 8px;
    text-align: left;
    border: 1px solid #ddd;
}
th{
	background-color:#ffb366;
}
tr:hover{background-color:#e6e6e6}
</style>
<br/>
<?php
	}
	else{
	$bbt_list = mysqli_query($conn, "select * from ReadUsers where Role = '1' ORDER BY Username");
	echo "<center><div class='table-responsive'><table class ='table'>
		<tr> 
		<th><b>THERAPISTS</b></th>
		<th><b>MESSAGES</b></th>
		</tr>"; 
	while($row = mysqli_fetch_array($bbt_list)){
		$user = $row['UserID'];
		$username = $row['Username'];
		echo "<tr>"; 
		echo "<td>" . $username . "</td>";
		echo "<td>" . "<a href='UserFeedback.php?user=$user'><button type='button' class='btn btn-default'>
          <span class='glyphicon glyphicon-envelope'></span><span class='glyphicon glyphicon-pencil'></span>&nbsp&nbspMessages
        </button></button></a>" . "</td>";
			echo "</tr>"; 
	}
		echo "</table></div></center>";
	}
?>	
<style>
table {
    border-collapse: collapse;
    width: 100%;
	border: 1px solid #ddd;
}
th, td {
    padding: 8px;
    text-align: left;
    border: 1px solid #ddd;
}
th{
background-color:#ffb366;
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
    <!-- Script to Activate the Carousel -->
</body>
</html>