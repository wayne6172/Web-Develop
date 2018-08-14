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
		
		$Account = $_GET['Account'];
		
		//刪除Skin
	
		$sql = "SELECT * FROM skinshare WHERE skinshare.CreaterID = '$Account'";
		$result=$conn->query($sql);
		if($result!=NULL && $result->num_rows > 0){
			while($rows=$result->fetch_assoc()){
				if(file_exists("C:/xampp/htdocs/MineCraft/skin/".$rows['Img'])){
					unlink("C:/xampp/htdocs/MineCraft/skin/".$rows['Img']);
				}
			}
		}
		
		$sql = "DELETE FROM reply WHERE reply.CreaterID = '$Account'";
		$conn->query($sql);
		
		$sql = "SELECT * FROM skinshare WHERE skinshare.CreaterID = '$Account'";
		$result=$conn->query($sql);
		if($result!=NULL && $result->num_rows > 0){
			while($rows=$result->fetch_assoc()){
				$ContentID = $rows['ContentID'];
				$sql = "DELETE FROM reply WHERE reply.ContentID = '$ContentID'";
				$conn->query($sql);
			}
		}
		
		$sql = "DELETE FROM skinshare WHERE skinshare.CreaterID = '$Account'";
		$conn->query($sql);
		
		$sql = "DELETE FROM account WHERE account.AccountID = '$Account'";
		if($conn->query($sql)===true){
			echo "<script>alert('已將" . $Account . "刪除'); location.href=\"ManagerLogin.php\";</script>";
		}
		else {
			echo $conn->error;
		}
	?>
</body>
</html>