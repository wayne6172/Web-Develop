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
		
		if(!isset($_COOKIE['AccountID'])){
			echo "<script type='text/javascript'>
			alert('您已登出，請重新登入');
			<!--window.parent.location.reload();-->
			</script>";
		}
		else {
	
			$Account = $_COOKIE['AccountID'];

			$sql = "SELECT * FROM account WHERE AccountID = '$Account'";

			$result = $conn->query($sql);

			if($result->num_rows > 0){
				$rows = $result->fetch_assoc();
				if($rows['Special']==0){
					echo "<script>alert('你非管理員，請離開');
					window.parent.location.reload();</script>";
				}
				else {
					header("Location: ManagerControl.html");
				}
			}
			else {
				echo "登入失敗，請確認帳號密碼是否有誤";
			}
		}
	?>
</body>
</html>