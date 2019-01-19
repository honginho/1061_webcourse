<?php
include ('db_conn.php'); // 匯入連線檔案
session_start();
if($_SESSION["identifier"]!=1){
header("Location:../index.html" );
}
include 'header_cl.html';
?>
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
	<head>
	<title>修改密碼</title>
	</head>
<SCRIPT type="text/javascript">
        function check()
        {
                <!-- 若<form>屬性name值為reg裡的文字方塊值為空字串，則顯示「未輸入姓名」 -->
                if(reg.newpassword.value == "") 
                {
                        alert("未輸入新密碼");
                }
                <!-- 若<form>屬性name值為reg裡的文字方塊與下拉式選單值為空字串或是沒有選擇月或日，則顯示「未輸入完整生日日期」 -->
                else if(reg.newpassword1.value == "") 
                {
                        alert("未輸入確認新密碼");
                }
				else if(reg.newpassword.value!=reg.newpassword1.value) 
                {
                        alert("密碼不相符");
                }
                else reg.submit();
         }
</SCRIPT>
<body>

<section class="clTable">
  <h1>修改密碼</h1>
    <form name="reg" action="change_password.php" method="post">
        <p style="padding-bottom:5px;">
            新密碼：<input type="text" name="newpassword" id="insert">
        </p>
        <p style="padding-top:5px;">
            確認新密碼：<input type="text" name="newpassword1" id="insert">
        </p>
        <div class="tbl-btn">
            <input type="button" value="送出" onClick="check()" />
            <input type="reset" value="清除">
        </div>
    </form>
</section>

<!--
    <center><h1>修改密碼</h1></center>
    <hr size="10px" align="center" width="100%">
    <div id="change">
	<form id="form"  name="reg" action="change_password.php" method="post">
    	新密碼：<input type="text" name="newpassword" id="insert"><br><br>
    	確認新密碼：<input  type="text" name="newpassword1" id="insert"><br>
	   <input id="butsty" style="width: auto;" type="button" value="送出" onClick="check()" />
        <input id="butsty" style="width: auto;" type="reset" value="清除">
    </form>
    </div>
 -->
</body>
</html>