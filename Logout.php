<?php
	session_start();
	session_destroy();
	setcookie("Username", "", time()-7200);
	$LogoutMessage = urlencode("<h6 id='alerts'>Logout successful!</h6>");
	header('Location: Login.php?logout='. $LogoutMessage); //$LogoutMessage links to logout.php with logout=
	die;
	
?>