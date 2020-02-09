<html>
<body>
	<?php
	$aDay = $_GET['someday'];
	$d=explode("-",$aDay);
	/* 將字串藉由delimiter分離, 回傳陣列: explode ( string $delimiter , string $string [, int $limit = PHP_INT_MAX ] ) : array*/
	$week=date("l",mktime(0,0,0,$d[1],$d[2],$d[0]));
	if(!checkdate($d[1], $d[2], $d[0]))
	/* 實驗發現格式正確會傳1, 但是格式錯誤不會傳0. checkdate ( int $month , int $day , int $year ) : bool*/
		echo "輸入的日期不對 <br>!!!";
	else
		echo "$d[0] $d[1] $d[2] is $week";
	?>
</body>
</html>
