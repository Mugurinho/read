<!DOCTYPE html>
<html lang="en">

<head>			
  <title>READ Registered users</title>
  <meta charset="UTF-8" />
  <meta name="author" content="" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link href="" rel="stylesheet" />
</head>
	<body>
		<p>READ Registered users</p>
		<hr>
		<p>Role: 0 - normal user;&nbsp 1 - bibliotherapist</p>
		<p>Passwords: every user has got different password</p>
		<hr>

<?php
include("db_connect.php");//we always need a database connection
	$sql = "SELECT * FROM ReadUsers ORDER BY Role";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "Role: " . $row["Role"]. " - UserId: " . $row["UserID"]. " - Username: " . $row["Username"]. "<br>";
    }
} else {
    echo "No results here";
}
mysqli_close($conn);
?>
<hr>
For READ testing purposes: username, password:
<p>patient, 123456<p>
<p>bbt, 123456</p>
</body>
</html>