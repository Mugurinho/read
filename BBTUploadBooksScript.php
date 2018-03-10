<?php session_start();
include("db_connect.php");
//code has been borrowed and altered for the pdf file upload from: http://staffweb.cms.gre.ac.uk/~mk05/web/PHP/upload.html 
$admin='';
if(isset($_SESSION['Username'])){
$admin = $_SESSION['Username'];
}
	if(isset($_POST['Upload']) && $_FILES['userfile']['size'] > 0){
		$title = $_POST['txtboxTitle'];
		$fileName = $_FILES['userfile']['name'];
		$tmpName  = $_FILES['userfile']['tmp_name'];
		$fileSize = $_FILES['userfile']['size'];
		$fileType = $_FILES['userfile']['type'];
		$fp = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);
			$description = $_POST['txtboxDescription'];
			$genre = $_POST['selectGenre'];
			$image = ($_FILES['image']['tmp_name']); 
			$name = ($_FILES['image']['name']);
			if(!get_magic_quotes_gpc())
			{
				$fileName = addslashes($fileName);
			}

if (!($handle = fopen ($_FILES['image']['tmp_name'], "r")) ) {
   echo('<p>Error opening temp file</p></body></html>');
} else if ( !($image = fread ($handle, filesize($_FILES['image']['tmp_name']))) ) {
   echo('<p>Error reading temp file</p></body></html>');
}
else {
		fclose ($handle);
		$image = mysqli_real_escape_string($conn, $image);
		$query = mysqli_fetch_row( mysqli_query ($conn, "select UserID from ReadUsers where Username='$admin'"));
		$qry = "insert into ReadBooks(Type, Size, FileName, Title, Description, Genre, File, Image, UserID) values ('$fileType', '$fileSize', '$fileName', '$title', '$description',   '$genre', '$content', '$image', '$query[0]')";
		$result = mysqli_query($conn, $qry);
		if($result)
		{
			$Message_active = urlencode("<h6 id='alerts'>The book: $title has been uploaded!</h6>");
			header('Location: BBTUploadBooks.php?uploadbooks='. $Message_active);
		}
		else
		{
			 echo "<script>alert('Book not uploaded, Please try again!')</script>";
			 echo nl2br("Book not uploaded, Please try again!");
		}
	
		mysqli_close($conn);
	}
	}
?>