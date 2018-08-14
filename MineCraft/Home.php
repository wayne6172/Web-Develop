<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>MyMineCraft</title>
	<style>
		header {
			background-image: url(HomeImg3.jpg);
			padding: 125px 500px;
		}
		header h1{
			margin: auto;
			color: red;
			text-align: center;
		}
		nav{
			float: left;
			max-width: 150px;
			margin: 0;
			padding: 1em;
		}
		nav ul{
			list-style-type: none;
			padding: 0;
		}
		nav li{
			font-family: "標楷體";
			padding: 20px 0px;
			font-size: 20px;
		}
		nav ul a{
			text-decoration: none;
		}
		article{
			float: right;
		}
	</style>
	
</head>

<body>
	<header>
		<h1><a href="Home.php" style="text-decoration:none;color:red">MineCraft 新手教學</a></h1>
	</header>
	<nav>
		<ul>
			
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "myminecraft";

				$conn = new MySQLi($servername,$username,$password,$dbname);
				$conn->query("SET NAMES 'UTF8'");
				
				if (!isset($_COOKIE['AccountID'])){
					echo "<li><a href=\"loginAccount.html\" target=\"iframe_a\" style=\"color: red\">登入</a></li>";
					echo "<li><a href=\"login.html\" target=\"iframe_a\" style=\"color: red\">註冊</a></li>";
				}
				else {
					$AccountCookie = $_COOKIE['AccountID'];

					$sql = "SELECT * from account WHERE AccountID='$AccountCookie'";

					$result = $conn->query($sql);
					
					echo "<li style=\"color: #0A91D3\">";
					if($result->num_rows > 0){
						$rows = $result->fetch_assoc();
						
						echo "使用帳號：<br>";
						echo $rows['AccountID']."<br><br>";
						
						echo $rows['Name'];
						if($rows['Sex']==1)
							echo "先生";
						else echo "小姐";
					}
					echo "</li>";
					if($rows['Sex']==1)
						echo "<li><img src=\"Boy.png\" width=\"120px\"></li>";
					else echo "<li><img src=\"Girl.jpg\" width=\"120px\"></li>";
					echo "<li><a href=\"logoutAccount.php\" target=\"iframe_a\" style=\"color: red\">登出</a></li>";
				}
			?>
			
			<li><a href="GameIntrodution.php" target="iframe_a" style="color: orange">遊戲介紹</a></li>
			<li><a href="CharaterSkin.php" target="iframe_a" style="color: #D1D700">角色Skin</a></li>
			<li><a href="OrganProduction.html" target="iframe_a" style="color: green">紅石機關製作</a></li>
			<li><a href="https://home.gamer.com.tw/creationDetail.php?sn=2502390" target="_blank" style="color: blue">開設伺服器</a></li>
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "myminecraft";
			
				$conn = new MySQLi($servername,$username,$password,$dbname);
				$conn->query("SET NAMES 'UTF8'");
			
				if (isset($_COOKIE['AccountID'])){
					
					$AccountCookie = $_COOKIE['AccountID'];

					$sql = "SELECT * from account WHERE AccountID='$AccountCookie'";
					
					$result = $conn->query($sql);
					
					if($result->num_rows > 0){
						$rows = $result->fetch_assoc();
						if($rows['Special']==1){
							echo "<li><a href=\"ManagerControl.html\" target=\"iframe_a\" style=\"color: purple\">管理員專區</a></li>";
						}
					}
				}
				
			?>
		</ul>
	</nav>
	
	<iframe style="border: none" name="iframe_a" width="1000px" height="750px" src="HomeHead.html"></iframe>
	
	<article>
		<img src="HomeImg4.jpg" width="350px" height="750px">
	</article>
	
	<audio autoplay controls loop>
		<source src="BGM.mp3" type="audio/mpeg">
	</audio>
</body>
</html>
