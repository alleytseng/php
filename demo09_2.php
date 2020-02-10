<?php
ini_set('display_errors','1');
error_reporting(E_ALL);
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
echo $content;
?>
