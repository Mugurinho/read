<?php
session_start();
include("db_connect.php");
//this code has been copied and adapted from: https://www.youtube.com/watch?v=rQOw0l9a8Ck
	if(isset($_POST['Submit'])){
		$user_name = $_SESSION['Username'];
		$code = $_POST['txtboxCode'];
		//checking user's input code against database
		$checkcode = "select Code from ReadUsers where Username='$user_name' AND Code='$code'";
		$run = mysqli_fetch_array(mysqli_query($conn, $checkcode));
			if($run !=0 || $run !=null)
			{
				mysqli_query ($conn, "UPDATE ReadUsers SET isActive='1' WHERE Username='$user_name'"); 
				$Message = urlencode("<h6 id='alerts'>Account has been activated!</h6>");
				header('Location: Login.php?success='. $Message);
				die;
			}
			else
			{
				$Message = urlencode("<h6 id='red'>Wrong code, Please try again!</h6>");
				header('Location: activation_code.php?activate='. $Message);
				die;
			}
}
mysqli_close($conn);
?>