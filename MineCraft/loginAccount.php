<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
		$servername = "localhost";
		$username =	"root";
		$password = "";
		$mydb = "myminecraft";
		
		$Account = $_POST['Account'];
		$AccountPassword = $_POST['PassWord'];
	
		$conn = new MySQLi($servername,$username,$password,$mydb);
		$conn->query("SET NAMES 'UTF8'");
	
		$sql = "SELECT * FROM account WHERE AccountID = '$Account' AND Password = '$AccountPassword'";
	
		$result = $conn->query($sql);
	
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			
			$cookieexpiry = (time() + 3600);
			setcookie("AccountID", $row['AccountID'], $cookieexpiry);
			
			echo "<script type='text/javascript'>
			alert('您已成功登入');
			window.parent.location.reload();
			</script>";
		}
		else {
			echo "<script type='text/javascript'>
			alert('登入失敗，請再次確認帳密是否有誤');
			document.location.href=\"loginAccount.html\";
			</script>";
		}
	?>
</body>
</html>