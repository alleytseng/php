<?php
/*ini_set('display_errors','1');
error_reporting(E_ALL);*/
$link=@mysqli_connect("localhost","alley","alley","myweb") or die("無法連上資料庫");
//連接資料庫myweb,帳號密碼都是alley
$sql="insert into practice (name,sex,birthday,salary) value('donkey','boy','1988-05-22',100000);";
//插入一筆資料到表單practice的動作存在變數$sql
if(mysqli_query($link, $sql))//指令sql執行
	echo "資料新增完畢<br>";

$sql2="select * from practice";
$result=mysqli_query($link, $sql2);//指令sql2執行
while($data=mysqli_fetch_array($result))//讀出陣列資料
	echo $data['name']."是".$data['sex'].", 生日是 ".$data['birthday']."<br>";

$result=mysqli_query($link, $sql2);
while(list($num,$name,$sex,$birthday,$salary)=mysqli_fetch_row($result))//函數list()將fetch到的資料分配到對應變數
	echo "{$name} 是 {$sex}, 生日是 {$birthday}<br>";
mysql_close($link);
?>
<HTML>
<HEAD><TITLE>php and sql</TITLE></HEAD>
<BODY><!--
	<FORM action="demo0401.php" method="get">
		請輸入姓名:<input type="text" name="somebody">
		稱謂:<input type="text" name="title">	
		<input type="submit" name="送出">	
	</FORM>-->	
</BODY>
</HTML>
<!--
methord="get" 缺點: 元件值不能超過100字元, 優點: 參數值會顯示在網址上
methord="post" 反之於get
-->
