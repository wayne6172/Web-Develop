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
		
		$sql = "SELECT Special FROM account WHERE AccountID = '$Account'";
		
		$result = $conn->query($sql);
		$rows = $result->fetch_assoc();
		$Special = $rows['Special'] == 1 ? 1 : 0;
		$NextSpecial = $rows['Special'] == 1 ? 0 : 1;
	
		$sql = "UPDATE account SET Special = '$NextSpecial' WHERE account.AccountID = '$Account'";
		
		if($conn->query($sql)===true){
			if($Special == 0)
				echo "<script>alert('已將" . $Account . "成功晉升管理員'); location.href=\"ManagerLogin.php\";</script>";
			else echo "<script>alert('已將" . $Account . "成功降階至會員'); location.href=\"ManagerLogin.php\";</script>";
		}
		else {
			echo $conn->error;
		}
	?>
</body>
</html>