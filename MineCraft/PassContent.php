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
	
		$sql = "UPDATE skinshare SET Open = 1 WHERE skinshare.ContentID = '$ContentID'";
	
		$conn->query($sql);
	
		echo "<script>alert('已將文章上傳'); location.href=\"ManagerControl.html\";</script>";
	?>
</body>
</html>