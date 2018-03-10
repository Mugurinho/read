<?php
session_start();
include("db_connect.php");
if(isset($_POST['Submit'])){
		$username = $_POST['txtboxUsername'];
		$password = sha1($_POST['txtboxPassword']);
		$username = stripslashes($username);
		$password = stripslashes($password);
		//check the username, password and active
		$checkuser = "select * from ReadUsers where Username='$username' AND Password='$password' AND Role = 0 AND isActive = 1";
		$run = mysqli_query($conn, $checkuser);
		if(mysqli_num_rows($run)>0){ 
			$_SESSION['Username'] = $username; 
				header('Location: UserHomePage.php');
				die;					
		} 
		$checkbbt = "select * from ReadUsers where Username='$username' AND Password='$password' AND Role = 1 AND isActive = 1";
		$run = mysqli_query($conn, $checkbbt);
		if(mysqli_num_rows($run)>0){ 
			$_SESSION['Username'] = $username; 
				header('Location: BBTHomePage.php');
				die;					
		} 
		else{
			$Message = urlencode("<h6 id='red'>Username or password incorrect!</h6>");
			header('Location: Login.php?incorrect='. $Message);
			die;
		}
	}
		mysqli_close($conn);
?>