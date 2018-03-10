<?php session_start();
include("db_connect.php");
//a message shows to user when a message is submitted
if(isset($_GET['Message'])){
    echo $_GET['Message'];
}
	if(isset($_SESSION['Username'])){
		$admin = $_SESSION['Username'];
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
					<h2 class="intro-text text-center">BIBLIOTHERAPY 
					<strong>SESSIONS</strong>
					</h2>
					<hr>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo" title = "Click here for guidance">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Sessions Guide
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <p id = "guide">
		On the Sessions page there is a list of registered patients/readers. You can click the Read/write message buttons to see if there are any messages received from users.
		You can then respond to users by sending a message back to them. You can as well use the Select option to send a book to the user providing the patient's condition has been acknowledged.</p>
      </div>
    </div>
  </div>
 </div>
<?php 
//code has been borrowed and adapted for READ from: https://www.youtube.com/watch?v=UzE3oQeKcDI&list=PLGCjwl1RrtcTGL5NPycrOunRsWGquHi_k 
//if the user is clicked, show his table and details
if(isset($_GET['user']) && !empty($_GET['user'])){
			echo "<center><table class ='table'>
			<tr> 
			<th><b>USERS</b></th>
			<th><b>MESSAGE</b></th> 
			<th><b>DATE</b></th>  
			</tr>"; 
	$user = $_GET['user'];
	//query for user 2 to display his id
	$user2 = $_SESSION['Username'];
	$list = mysqli_query($conn, "select * from ReadUsers where Username = '$user2'");
		while($setAdmin = mysqli_fetch_array($list)){
		$user2 = $setAdmin['UserID']; //this code displays the bbt ID
		}
	//displays the 10 most recent messages, can be changed 
	$display_message = mysqli_query($conn, "select * from ReadMessages WHERE FromID = '$user'  AND ToID = '$user2' OR FromID = '$user2' AND ToID = '$user' ORDER BY Date DESC LIMIT 10");
	while($row = mysqli_fetch_array($display_message)){  
			$from_id = $row['FromID'];
			$bbtuser_query = mysqli_query($conn, "select * from ReadUsers where UserID = '$from_id'");
			$bbtresult = mysqli_fetch_array($bbtuser_query);
			$from_username = $bbtresult['Username']; //from which user
			$to_id = $row['ToID'];
			$user_query = mysqli_query($conn, "select * from ReadUsers where UserID = '$to_id'");
			$result = mysqli_fetch_array($user_query);
			$to_username = $result['Username']; //to which user
			$email = $result['Email'];
			$date = $row['Date'];
			$read_message = $row['Message'];
				echo "<tr>"; 
				echo "<td>" . $from_username . "</td>"; 
				echo "<td>" . $read_message . "</td>";
				echo "<td>" . $date . "</td>";
				echo "</tr>";
	}
	echo "</table></center>";
?>
</div>
<form role="form" method="post" action="" enctype="multipart/form-data" accept-charset='UTF-8'>
 <?php
	if(isset($_POST['Submit'])){
	    $email = $_POST['txtboxEmail'];
		$date = date('Y-m-d H:i:s');
		$user = $_GET['user'];
		$message = $_POST['txtboxFeedback'];
		$adminList = mysqli_query($conn, "select * from ReadUsers where Username = '$admin'");
		while($runAdmin = mysqli_fetch_array($adminList)){
		$admin = $runAdmin['UserID']; //this code displays the user ID
		$to = $email;
		$book = $_POST['selectBooks'];
		mysqli_query($conn, "insert into ReadMessages(FromID, ToID, Message, Date, Book) Values ('$admin', '$user', '$message', '$date', '$book')");
		$admin = $_SESSION['Username'];
		echo '<meta http-equiv="Refresh" content="0";url=BBTFeedback.php>';//refreshes the page for live results
		$subject = "New message from READ";
		$headers = "From: mb9065d@greenwich.ac.uk";
		$body = "New message has been added by $admin.\n To see message please login at: http://read.16mb.com/Login.php";
			if(!mail($email, $subject, $body, $headers))
			echo"We couldn't sign you up now. Please try again.";
	}
}
mysqli_close($conn);
?>
<div class="form-group col-lg-8">
	<label>Enter your message</label>
		<textarea rows="4" cols="50" class="form-control" placeholder="Type your message here (maximum 500 letters)..." maxlength = "500" id="feedback" name="txtboxFeedback" required/></textarea>
		<br>
<label>Select a book (optional)</label>
<div class="input-group input-group-md">
<span class="input-group-addon">
<span class="glyphicon glyphicon-list"></span></span>
<select class="form-control" id="genre" name="selectBooks">
<option></option>
<?php //displays books by title
include("db_connect.php");
	$query = "SELECT * FROM ReadBooks ORDER BY FileName";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result)){
			$book = $row['FileName'];
			$bookid = $row['ID'];
?>
<option><?php echo $book; ?></option>
<?php
}
?>
</select></div><br>
<?php
$adminMail = mysqli_query($conn, "select * from ReadUsers where UserID = '$user'");
while($runMail = mysqli_fetch_array($adminMail)){
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
	$user_list = mysqli_query($conn, "select UserID, Username, Email, Role from ReadUsers where Role = '0' ORDER BY Username");
	echo "<center><div class='table-responsive'><table class ='table'>
		<tr> 
		<th><b>PATIENTS</b></th>
		<th><b>MESSAGES</b></th>  
		</tr>"; 
	while($run_user = mysqli_fetch_array($user_list)){
		$user = $run_user['UserID'];//to display id on bar
		$admin = $run_user['Username'];//to display usernames on left table
		echo "<tr>"; 
		echo "<td>" . $admin . "</td>";
		echo "<td>" . "<a href='BBTFeedback.php?user=$user'><button type='button' class='btn btn-default'>
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