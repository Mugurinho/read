<?php 
include("db_connect.php");
if (isset($_POST['Submit'])){
$email = $_POST['txtboxEmail'];
//check email
$check_email = "SELECT * from ReadUsers WHERE Email = '$email'";
$run = mysqli_query($conn, $check_email);
if(mysqli_num_rows($run) <= 0){
$alertEmail = urlencode("<h6 id='red'>Email not registered, try again!</h6>");
header('Location: reset.php?noemail='. $alertEmail);
exit();
}
else{
//carry on
$query = mysqli_query($conn, "SELECT Username FROM ReadUsers WHERE Email = '$email' ")or die (mysqli_error());
$result = mysqli_fetch_array($query);
$username = $result['Username'];//show username in email
$password = rand(111111, 999999); 
$pass = sha1($password); //encrypted for database
//send email
$to = "$email";
$subject = "READ: Account password reset";
$body = "Hi $username\nYou have submited a password reset. Your new password is $password \nYour password has been reset, please login and change your password to http://read.16mb.com/Login.php \n Regards \n READ";
$headers = "From: mb9065d@greenwich.ac.uk";
mail($to, $subject, $body, $headers);
//update database
$sql = mysqli_query($conn, "UPDATE ReadUsers SET Password='$pass' WHERE Email = '$email'")or die (mysql_error());
$MessageEmail = urlencode("<h6 id='alerts'>Your password has been reset, please check your email!</h6>");
header('Location: reset.php?goodemail='. $MessageEmail);
}
}
?>