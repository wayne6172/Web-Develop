<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script>
	function DeleteReply(x){
		location.href = "DeleteReply.php?ReplyID=" + x;
	}
</script>
</head>

<body>
	<?php
		$servername = "localhost";
		$username =	"root";
		$password = "";
		$mydb = "myminecraft";
	
		$conn = new MySQLi($servername,$username,$password,$mydb);
		
		$conn->query("SET NAMES 'UTF8'");
		$sql = "SELECT * FROM skinshare WHERE Open = 1";
		
		
		
		$result = $conn->query($sql);
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				$title = $row['Title'];
				$content = $row['Content'];
				$Date = $row['Date'];
				$Creater = $row['CreaterID'];
				$Img = "skin/".$row['Img'];
				$ContentID = $row['ContentID'];
				
				
				echo "<header float='left'>";
				echo "<h1>" . $title . "</h1>";
				echo "<img src='$Img' height='250px'>";
				echo "<p>" . $content . "</p>";
				echo "</header>";
				
				$result2 = $conn->query("SELECT Special FROM account WHERE AccountID = '$Creater'");
				
				$row2=$result2->fetch_assoc();
				
				echo "<article>";
				echo "<p align='right'>" . $Date . '</p>';
				if($row2['Special']==1)
					echo '<p align="right" style="color:red"> 版主 ' . $Creater . '</p>';
				else echo '<p align="right"> 會員 ' . $Creater . '</p>';
				echo "</article>";
				
				echo "<hr>";
				
				$result2 = $conn->query("SELECT * FROM reply WHERE ContentID='$ContentID' ORDER BY Date");
				if($result2 != NULL && $result2->num_rows > 0){
					echo "<table>";
					while($row2=$result2->fetch_assoc()){
						$ReplyContent = $row2['CreaterID'];
						
						echo "<tr>";
						if($row2['IsGood']==1)echo"<td width=\"120px\" style=\"color: blue\"><img src=\"Good.jpg\" width=\"15px\">讚</td>";
						else echo"<td width=\"120px\" style=\"color: red\"><img src=\"Bad.jpg\" width=\"15px\">噓</td>";
						echo "<td width=\"480px\"";
						
						$result3 = $conn->query("SELECT Special FROM account WHERE AccountID='$ReplyContent'");
						$row3 = $result3->fetch_assoc();
						
						if($row3['Special']==1){
							echo " style=\"color:red\"";
						}
						else if($Creater == $row2['CreaterID']){
							echo " style=\"color:blue\"";
						}
						
						echo ">". $row2['CreaterID'] ." : " . $row2['Content'] . "</td>";
						
						$result3 = $conn->query("SELECT Special FROM account WHERE AccountID='$ReplyContent'");
						$row3 = $result3->fetch_assoc();
						
						if(isset($_COOKIE['AccountID'])){
							echo "<td width=\"250px\" align=\"center\">留言時間: ". $row2['Date'] ."</td>";
							echo "<td>";
							$NowAccount = $_COOKIE['AccountID'];
							$result3 = $conn->query("SELECT Special FROM account WHERE AccountID='$NowAccount'");
							$row3 = $result3->fetch_assoc();
							
							$ReplyID = $row2['ReplyID'];
							
							if($row3['Special']==1){
								echo "<input type=\"button\" onclick=\"DeleteReply('$ReplyID')\" value=\"刪除\">";
							}
							else if($row2['CreaterID']==$_COOKIE['AccountID']){
								echo "<input type=\"button\" onclick=\"DeleteReply('$ReplyID')\" value=\"刪除\">";
							}
							echo "</td>";
						}
						else {
							echo "<td width=\"350px\" align=\"right\">留言時間: ". $row2['Date'] ."</td>";
						}
						
						
						echo "</tr>";
						
					}
					if(isset($_COOKIE['AccountID'])){
						echo "<tr><form action=\"ReplyContent.php?ContentID=". $ContentID ."\" method=\"post\">";
						echo"<td width=\"120px\"><input type=\"radio\" name=\"IsGood\" value=\"Good\" required>讚<input type=\"radio\" name=\"IsGood\" value=\"Bad\" required>噓</td>";
						echo "<td width=\"730px\"><input type=\"text\" name=\"Reply\" size=\"70\" placeholder=\"請輸入你的留言\" required>" . " " . "<input type=\"submit\" value=\"送出\"></td>";
						echo "</form></tr>";
					}
					echo "</table>";
				}
				else {
					echo "尚未有人留言";
					if(isset($_COOKIE['AccountID'])){
						echo "<table><tr><form action=\"ReplyContent.php?ContentID=". $ContentID ."\" method=\"post\">";
						echo"<td width=\"120px\"><input type=\"radio\" name=\"IsGood\" value=\"Good\" required>讚<input type=\"radio\" name=\"IsGood\" value=\"Bad\" required>噓</td>";
						echo "<td width=\"730px\"><input type=\"text\" name=\"Reply\" size=\"70\" placeholder=\"請輸入你的留言\" required>" . " " . "<input type=\"submit\" value=\"送出\"></td>";
						echo "</form></tr></table>";
					}
				}
				
				echo "<hr style='border: 3px solid black'>";
				
			}
		}
		else {
			echo "<h1 align='center'>目前沒人分享，就由你當第一個吧!</h1>";
		}
	?>
</body>
</html>