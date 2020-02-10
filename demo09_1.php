<html>
<head>
	<!--
	<meta http-equiv="content-type" content="text/html; charset=Big5">
	<link rel="stylesheet" type="text/css" media="screen" href="style.css">
	-->
	<title>簡易訂單</title>
</head>
<body>
	<form action="demo09_2.php" method="post">
	請輸入姓名<input type="text" name="username"><br>
	請輸入郵件<input type="text" name="email"><br>
	選擇想買的物品<br>
	<input type="checkbox" name="goods[]" value="12吋 PowerBooK">
	12吋 PowerBooK NT 56,900 元¸<br>
	<input type="checkbox" name="goods[]" value="14吋 PowerBooK">
	14吋 PowerBooK NT 74,900 元¸<br>
	<input type="checkbox" name="goods[]" value="15吋 PowerBooK">
	15吋 PowerBooK NT 92,900 元¸<br>
	<input type="submit" value="­訂購">
	</form>
</body>
</html>
