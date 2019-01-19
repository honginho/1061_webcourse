<?php 
header("Content-type: text/html; charset=utf8"); //頁面編碼
header("Content-Type:application/msword");   //將此html頁面轉成word
header("Content-Disposition:attachment;filename=".mb_convert_encoding("purchase","gbk","utf8").".doc");   //設定word檔名
header("Pragma:no-cache");
header("Expires:0");
//header("Location:showcart.php");
?>  
<html>
<meta http-equiv=Content-Type content="text/html; charset=utf8">
<body>
    <p>要印出的東西</p>
</body>
</html>