<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<style>
</style>
</head>

<body>
	<img src="skin/1.jpg" width="100">
	<img src="skin/2.png" width="100">
	<img src="skin/3.jpg" width="100">
	<img src="skin/5.jpg" width="100">
	<img src="skin/6.jpg" width="100">
	<img src="skin/7.png" width="100">
	<img src="skin/8.png" width="100">
	<img src="skin/9.jpg" width="100">
	<img src="skin/11.jpg" width="100">
	
	<a href="https://forum.gamer.com.tw/B.php?bsn=18673&subbsn=2" target="_blank"><p align="center">參考資料請點我</p></a>
	<h3 align="center">以上是板主所推薦的SKIN</h3>
	
	<iframe style="border: none" src="PrintSkin.php" width = "965px" height="650px"></iframe>
	
	<?php
		if(!isset($_COOKIE['AccountID'])){
			echo "<p>你尚未登入，趕緊<a href=\"loginAccount.html\" target=\"_SELF\">登入</a>分享你的Skin或留言別人的Skin吧";
		}
		else {
			echo "<p>來分享你的Skin吧</p>
			<form action=\"CheckCharaterSkin.php\" method=\"post\" enctype=\"multipart/form-data\">
			Skin名稱：<input type=\"text\" name=\"SkinName\" required/>
			<br>Skin介紹：<br/><textarea rows=\"10\" cols=\"80\" name=\"SkinContent\" required></textarea>
			<br>上傳圖片：<input type=\"file\" name=\"file\" required>
			<p></p>
			<br>
			<input type=\"submit\" value=\"提交\"/>
			<input type=\"reset\" value=\"取消\"/>
			</form>";
		}
	?>
	
	
</body>
</html>
