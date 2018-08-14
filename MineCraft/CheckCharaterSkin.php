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
		$conn->query("SET NAMES 'UTF8'");	
	
		$SkinName = $_POST['SkinName'];
		$SkinContent = nl2br($_POST['SkinContent']);
		$Date = date("Y/m/d");
	
		if(!isset($_COOKIE['AccountID'])){
			echo "<script type='text/javascript'>
			alert('您尚未登入');
			document.location.href=\"loginAccount.html\";
			</script>";
		}
		else {
			$Account = $_COOKIE['AccountID'];
			$sql = "SELECT * FROM account WHERE AccountID = '$Account'";

			$result = $conn->query($sql);

			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$Special = $row['Special'];
				if(file_exists("C:/xampp/htdocs/MineCraft/skin/".$_FILES["file"]["name"])){
					echo "檔案已存在，請修改檔名";
				}
				else {

					$img = $_FILES["file"]["name"];
					$sql = "INSERT INTO skinshare(Title,Content,Date,CreaterID,Img,Open) Value('$SkinName','$SkinContent','$Date','$Account','$img','$Special')";

					if($conn->query($sql) === true){
						if($Special == 0)
							echo "<script>alert('成功上傳，請等待版主核可');location.href=\"CharaterSkin.php\"</script>";
						else echo "<script>alert('成功上傳');location.href=\"CharaterSkin.php\"</script>";;

						move_uploaded_file($_FILES["file"]["tmp_name"],"C:/xampp/htdocs/MineCraft/skin/".$_FILES["file"]["name"]);
					}
					else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}

			}
			else {
				echo "帳號輸入有誤或無此帳號，請重新確認";
			}
		}
	?>
</body>
</html>
