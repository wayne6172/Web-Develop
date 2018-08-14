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
	
		$ContentID = $_GET['ContentID'];
		$Content = $_POST['Reply'];
		$CreaterID = $_COOKIE['AccountID'];
		$IsGood = $_POST['IsGood'] == "Good" ? 1 : 0;
		$Date = date("Y/m/d");	
	
		$sql = "INSERT INTO reply(ContentID,Content,CreaterID,Date,IsGood) VALUES('$ContentID','$Content','$CreaterID','$Date','$IsGood')";
	
		$result=$conn->query($sql);
		
		header('Location: PrintSkin.php');
	?>
</body>
</html>