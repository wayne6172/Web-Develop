<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<style>
</style>
</head>

<body>	
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "myminecraft";
	
		$conn = new MySQLi($servername,$username,$password,$dbname);
	
		$sql = "SELECT * FROM gameintrodution";
		
		$conn->query("SET NAMES 'UTF8'");
		$result = $conn->query($sql);
	
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$title = $row['Title'];
				$content = $row['Content'];
				$Date = $row['Date'];
				$Creater = $row['CreaterID'];
				$Img = $row['Img'];
				
				echo "<h1>" . $title . "</h1>";
				echo "<img src='$Img' width='970px'>";
				echo "<font size='5'>" . $content . "</font>";
				echo '<p align="right">' . $Date . '</p>';
				
				$result2 = $conn->query("SELECT Special FROM account WHERE AccountID = '$Creater'");
				
				$row2=$result2->fetch_assoc();
				
				if($row2['Special']==1)
					echo '<p align="right" style="color:red"> 版主 ' . $Creater . '</p>';
				else echo '<p align="right">會員 ' . $Creater . '</p>';
			}
		}
		else {
			echo "資料為0\n";
		}
	?>
</body>
</html>
