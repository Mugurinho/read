<?php 
session_start(); 
include("db_connect.php");
	if(isset($_POST['Submit'])){
		$username = ($_POST['txtboxUsername']);
		$password = sha1($_POST['txtboxPassword']);
		$email = $_POST['txtboxEmail'];
						//check for duplicate emails first
						$check_email = "select * from ReadUsers where Email = '$email'";
						$run = mysqli_query($conn, $check_email);
							if(mysqli_num_rows($run)>0){ //checks the table rows based on $run variable
								$emailMessage = urlencode("<h6 id='red'>Email registered, try again!</h6>");
								header('Location: Registration.php?dupliemail='. $emailMessage);
								exit();
							}
						//check for duplicate usernames second
						$check_username = "select * from ReadUsers where Username = '$username'";
						$run = mysqli_query($conn, $check_username);
							if(mysqli_num_rows($run)>0){
								$userMessage = urlencode("<h6 id='red'>Username registered, try again!</h6>");
								header('Location: Registration.php?dupliuser='. $userMessage);
								exit();
							}
					$code = rand(11111, 99999); 
					$to = $email;
					$subject = "Activate your account";
					$headers = "From: mb9065d@greenwich.ac.uk";
					$body = "Hello $username, \n\nYou need to activate your account in order to login. Activation code is $code\n\nThank you!";
						if(!mail($to, $subject, $body, $headers))
							echo"We couldn't sign you up now. Please try again.";
					$insert = "insert into ReadUsers (Username, Password, Email, Code) values ('$username', '$password', '$email', '$code')";
					if(mysqli_query($conn, $insert)){
					$_SESSION['Username'] = $username;
					$Message = urlencode("<h6 id='alerts'>Registration successful, check your email to activate your account!</h6>");
					header('Location: activation_code.php?Registration='. $Message);
					die;					
					}
					}
					mysqli_close($conn);		
?>