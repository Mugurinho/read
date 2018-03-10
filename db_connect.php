<?php
//database connection status 
require_once 'app_config.php'; //requires the defined constants
$conn = mysqli_connect(dbhost, dbuser, dbpass, dbname);
//echo "You are connected to the database"; //testing the connection message
if (!$conn){
	die("Database connection failed: " . mysqli_connect_error()); //message in case db connection fails
}
//select the database
$db_select = mysqli_select_db($conn, "portal");//if the current db user is selected
if (!$db_select){
   die("Database selection failed: " . mysqli_error($conn));
}
?>