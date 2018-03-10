<?php
//code has been borrowed and adapted from: http:stackoverflow.com/questions/4679756/show-a-pdf-files-in-users-browser-via-php-perl
include("db_connect.php");
if(isset($_GET['bookid'])){
   $bookid = $_GET['bookid']; 
   if (is_numeric($bookid)){
	$query = "SELECT * FROM ReadBooks WHERE ID = '$bookid'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$file = $row['File'];
	header('Content-Type:application/pdf');
	echo $file;
	readfile($file);
	}
	else{ 
		echo "Data Corrupted!";
		}
} 
else{
		echo "Data Missing!";
}
?>