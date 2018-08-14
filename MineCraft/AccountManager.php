<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
	table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
		width: 970px;
	}
	td{
		text-align: center;
	}
</style>
<script>
	function DeleteAccount(x){
		location.href = "DeleteAccount.php?Account=" + x;
	}
	function UpdateAccount(x){
		location.href = "UpdateAccount.php?Account=" + x;
	}
</script>
</head>

<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "myminecraft";
	
		$conn = new MySQLi($servername,$username,$password,$dbname);
		
		$conn->query("SET NAMES 'UTF8'");
		$sql = "SELECT * FROM account ORDER BY Special";
	
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			echo "<table>";
			echo "<tr>";
			echo "<th>" . "帳號" . "</th>";
			echo "<th>" . "信箱" . "</th>";
			echo "<th>" . "生日" . "</th>";
			echo "<th>" . "手機" . "</th>";
			echo "<th>" . "性別" . "</th>";
			echo "<th>" . "姓名" . "</th>";
			echo "<th>" . "管理員" . "</th>";
			echo "<th>" . "帳號管理" . "</th>";
			while($rows = $result->fetch_assoc()){
				$Account = $rows['AccountID'];
				$Email = $rows['Email'];
				$Birth = $rows['birthday'];
				$Phone = $rows['Phone'];
				$Sex = $rows['Sex'] == 1 ? '男' : '女';
				$Name = $rows['Name'];
				$Special = $rows['Special'] == 1 ? '是' : '否';
				
				echo "<tr>";
				echo "<td>" . $Account . "</td>";
				echo "<td>" . $Email . "</td>";
				echo "<td>" . $Birth . "</td>";
				echo "<td>" . $Phone . "</td>";
				echo "<td>" . $Sex . "</td>";
				echo "<td>" . $Name . "</td>";
				echo "<td>" . $Special . "</td>";
				echo "<td>" . "<input type=\"button\" value=\"刪除\" onclick=\"DeleteAccount('$Account')\"/>";
				
				
				if($rows['Special'] == 1){
					echo "<input type=\"button\" value=\"降階\" onclick=\"UpdateAccount('$Account')\"/>" . "</td>";
				}
				else {
					echo "<input type=\"button\" value=\"晉升\" onclick=\"UpdateAccount('$Account')\"/>" . "</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		}
	?>
</body>
</html>