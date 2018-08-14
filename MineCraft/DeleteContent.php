<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "myminecraft";
		
		$conn = new MySQLi($servername,$username,$password,$dbname);
		
		$ContentID = $_GET['Content'];
	
		$sql = "SELECT * FROM skinshare WHERE skinshare.ContentID = '$ContentID'";
		
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if(file_exists("C:/xampp/htdocs/MineCraft/skin/".$row['Img'])){
			unlink("C:/xampp/htdocs/MineCraft/skin/".$row['Img']);
		}
		
		$sql = "DELETE FROM reply WHERE reply.ContentID = '$ContentID'";
		$conn->query($sql);	
	
		$sql = "DELETE FROM skinshare WHERE skinshare.ContentID = '$ContentID'";
		$conn->query($sql);
	
		echo "<script>alert('已將文章刪除'); location.href=\"ManagerControl.html\";</script>";
	?>
</body>
</html>