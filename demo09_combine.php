<?php
switch($_REQUEST['op'])
{
	case "process":	
	$html=process();
	break;

	case "result":
	break;

 	default:
	$html=orderform();//一開始先顯示訂單輸入畫面
}
?>

<html>
<head>
	<!--
	<meta http-equiv="content-type" content="text/html; charset=Big5">
	<link rel="stylesheet" type="text/css" media="screen" href="style.css">
	-->
	<title>簡易訂單</title>
</head>
<body>
	<?php
	echo $html;
	?>
</body>
</html>

<?php
function orderform()
{/*
	<<<字串中若要成功顯示單引號和雙引號要用 \ 放在引號前面, 
	如果用<<<標籤 標籤; 也可以成功顯示所有引號

	<input type="hidden" name="op" value="process">
	用隱藏元件告知op是process
 */
	include("goods.php");
	$list="";
	foreach($goods as $goods_name=>$price)
		$list.="<input type=\"checkbox\" name=\"goods[]\" value= \"{$goods_name}\">".$goods_name." NT ".$price." 元<br>";
	$html=<<<FormAlley
	<html>
	<head>
		<!--
		<meta http-equiv="content-type" content="text/html; charset=Big5">
		<link rel="stylesheet" type="text/css" media="screen" href="style.css">
		-->
		<title>簡易訂單</title>
	</head>
	<body>
		<form action="demo09_combine.php" method="post">
		請輸入姓名<input type="text" name="username"><br>
		請輸入郵件<input type="text" name="email"><br>
		選擇想買的物品<br>
		$list
		<input type="hidden" name="op" value="process">
		<input type="submit" value="­訂購">
		</form>
	</body>
	</html>
	FormAlley;
	return $html;
}
function process()
{
	if(empty($_POST['username']))
		die("尚未填姓名!");
	if(empty($_POST['email']))
		die("尚未填郵件!");
	elseif(! preg_match ('/^[_.0-9a-z-]+@([0-9a-z-]+.)+[a-z]{2,3}$/', $_POST['email']))
		die("郵件格式錯誤!");
	if(empty($_POST['goods']))
		die("沒勾選物品!");
	/*
	書上的eregi在php7不能用, 改用preg_match.
	^: Start of line
	a+: One or more of a
	a{3}: Exactly 3 of a
	a{3,}: 3 or more of a
	a{3,6}: Between 3 and 6 of a
	$: End of line
	*/
	$content = "­訂購者:{$_POST['username']}
	­<br> Email: {$_POST['email']}<br>
	­訂購物品如下: <br>
	";

	//讀取複選欄位
	foreach($_POST['goods'] as $goods){
		$content .= $goods."<br>";
	}

	//date_default_timezone_set("Asia/Taipei");
	//不用寫死在程式裡, 在php.ini設定date.timezone = "Asia/Taipei" 電腦重開機即可
	$order_time=date("r");
	$content .= "下訂單時間:
	{$order_time}<br>";

	//寄信
	/*
	@mail("tadbook5@gmail.com","{$_POST['username']} ªº­q³æ",$content) or die("µLªk±H«Hµ¹ tadbook5@gmail.com");

	//±Hµ¹­qÁÊªÌ
	@mail($_POST['email'],"­q³æ½T»{",$content)  or die("µLªk±H«Hµ¹ {$_POST['email']}");
	*/
	return $content;
}
?>