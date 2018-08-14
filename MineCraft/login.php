<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
	<?php
		$servername = "localhost";
		$username =	"root";
		$password = "";
		$mydb = "myminecraft";
	
		$conn = new MySQLi($servername,$username,$password,$mydb);
		
		$AccountName = $_POST['name'];
		$AccountPasseord = $_POST['Password'];
		$AccountEmail = $_POST['mail'];
		$AccountSex = $_POST['sex'] == 'female' ? 0 : 1;
		$AccountBir = $_POST['birthday'];
		$AccountRealName = $_POST['Real_Name'];
		$AccountPhone = $_POST['Phone'];
	
		$sql = "SELECT AccountID FROM account WHERE AccountID = '$AccountName'";
		
		$conn->query("SET NAMES 'UTF8'");
		$result = $conn->query($sql);
	
		if($result->num_rows>0)echo "已有此帳號";
		else {
			
			$sql = "INSERT INTO account(AccountID,Password,Email,birthday,Phone,Sex,Name,Special) VALUES('$AccountName','$AccountPasseord','$AccountEmail','$AccountBir','$AccountPhone','$AccountSex','$AccountRealName',0)";
			
			if($conn->query($sql)===TRUE){
				echo "<script type='text/javascript'>alert('註冊成功');
				location.href=\"loginAccount.html\";</script>";
			}
			else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	?>
</body>
</html>