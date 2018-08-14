<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
		setcookie("AccountID","",time()-3600);
		echo "<script>alert('您已經登出');
		window.parent.location.reload();</script>"
	?>
</body>
</html>