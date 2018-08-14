<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script>
	function DeleteContent(x){
		location.href = "DeleteContent.php?Content=" + x;
	}
	function PassContent(x){
		location.href = "PassContent.php?Content=" + x;
	}
</script>
</head>

<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "myminecraft";
		
		$conn = new MySQLi($servername,$username,$password,$dbname);
		
		$conn->query("SET NAMES 'UTF8'");
	
		echo "<h1>\"Skin分享\"待審核文章</h1>";
		$sql = "SELECT * FROM skinshare WHERE Open = 0";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row=$result->fetch_assoc()){
				$title = $row['Title'];
				$content = $row['Content'];
				$Date = $row['Date'];
				$Creater = $row['CreaterID'];
				$Img = "skin/".$row['Img'];
				$ContentID = $row['ContentID'];
				
				echo "<h1>" . $title . "</h1>";
				echo "<img src='$Img' width='450px'>";
				echo "<p>" . $content . "</p>";
				echo "<p align='right'>" . $Date . '</p>';
				
				echo '<p align="right"> 會員 ' . $Creater . '</p>';
				
				echo "<input type=\"button\" value=\"刪除\" onclick=\"DeleteContent('$ContentID')\"/>";
				
				echo "<input type=\"button\" value=\"通過\" onclick=\"PassContent('$ContentID')\"/>";
			}
		}
		else {
			echo "<h3>無</h3>";
		}
	?>
</body>
</html>