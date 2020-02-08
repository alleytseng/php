<HTML>
<HEAD> my first php program </HEAD>
<BODY>
<?php
$my_name = "Alley";
echo $_REQUEST['somebody'].$_GET['title']
/*$_POST['title'] 相對於demo0403裡 form 的 methord = post*/
/*$_REQUEST 是form 的 methord = post 和 get 都能用*/
.", hello, welocome to {$my_name}'s php program!";
//phpinfo();
?>
</BODY>
</HTML>
