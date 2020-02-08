<HTML>
<HEAD><TITLE>第一個互動程式</TITLE></HEAD>
<BODY>
	<FORM action="demo0401.php" method="get">
		請輸入姓名:<input type="text" name="somebody">
		稱謂:<input type="text" name="title">	
		<input type="submit" name="送出">		
	</FORM>
</BODY>
</HTML>
//methord="get" 缺點: 元件值不能超過100字元, 優點: 參數值會顯示在網址上
//methord="post" 反之於get
