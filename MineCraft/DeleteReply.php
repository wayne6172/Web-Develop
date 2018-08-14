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
		$conn->query("SET NAMES 'UTF8'");
	
		$ReplyID = $_GET['ReplyID'];
		
		$conn->query("DELETE FROM reply WHERE ReplyID='$ReplyID'");
		header('location: PrintSkin.php');
	?>
</body>
</html>