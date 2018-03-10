<!DOCTYPE html>
<html lang="en">
<head>
<title>Details</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
.jumbotron{
	margin-top: 20%;
	background: white;
}
p{
    text-align: left;
}
body{
	background: grey;
}
</style>
</head>
<body>
<?php
include("db_connect.php");
if(isset($_GET['bookid'])){
   $bookid = $_GET['bookid']; 
   if (is_numeric($bookid)){
		$query = "SELECT * FROM ReadBooks WHERE ID = '$bookid'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$title = $row['Title'];$description = $row['Description'];$genre = $row['Genre'];
   }
   ?>
        <div class="container">
        <div class="row">
        <div class="col-xs-12">
        <div class="jumbotron">
			<h4>Title:</h4><?php echo $title, '<hr>'?>
			<h4>Description:</h4><?php echo $description, '<hr>'?>
			<h4>Genre:</h4><?php echo $genre, '<hr>'?>
			<a href='UserBooks.php'><button type="button"  class="btn btn-default btn-md" type="submit" name="Submit">
			<span class="glyphicon glyphicon-chevron-left"></span>&nbsp&nbspBack to Books</button></a>
		</div>
        </div>
		</div>
		</div>
<?php
}
?>
</body>
</html>                                		