<?php session_start();
include("db_connect.php");
if (isset($_POST['Submit'])){
$oldpassword = sha1($_POST['oldpassword']);
$newpassword = sha1($_POST['newpassword']);
$check_pass = "SELECT * from ReadUsers WHERE Password = '$oldpassword'";
$run = mysqli_query($conn, $check_pass);
if(mysqli_num_rows($run) <= 0){
$alertpass = urlencode("<h6 id='red'>Current password not match, try again!</h6>");
header('Location: UserChangePass.php?nopass='. $alertpass);
exit();
}
else{
$user = $_SESSION['Username'];//query for user 2 
	$list = mysqli_query($conn, "select * from ReadUsers where Username = '$user'");
	while($setAdmin = mysqli_fetch_array($list)){
	$user = $setAdmin['UserID']; //this code displays the admin ID
	}
$sql = mysqli_query($conn, "UPDATE ReadUsers SET Password = '$newpassword' WHERE UserID = $user")or die (mysql_error());
$MessagePass = urlencode("<h6 id='alerts'>Your password has been changed!</h6>");
header('Location: UserChangePass.php?newpass='. $MessagePass);
}
}
?>