<?php
session_start();
include 'db_conn.php'; // 匯入連線檔案
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("Connection Failed:".mysqli_connect_error());}
?>
<?php
if($_SESSION["identifier"]==1 || $_SESSION["identifier"]==""){
echo "沒有權限";
header('Location: login.html');
}
include 'header_ad.html';

include 'footer_ad.html';

?>
<!--html>
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<head>
<title>登入</title>
</head>
<body>
<h1><center><?php echo $_SESSION["account"];?>登入</center></h1>
<hr size="10px" align="center" width="300%">
<center>
<br><br>
<input type ="button" value="新增" style="width:280px;height:35px;font-size:20px;" onclick="location.href='insertticket.php'"></input><br>
<input type ="button" value="修改" style="width:280px;height:35px;font-size:20px;" onclick="location.href='ticket_change.php'"></input><br>
<input type ="button" value="刪除" style="width:280px;height:35px;font-size:20px;" onclick="location.href='ticketdelete.php'"></input><br>
<input type ="button" value="所有票" style="width:280px;height:35px;font-size:20px;" onclick="location.href='tickets.php'"></input><br>
<input type ="button" value="登出" style="width:280px;height:35px;font-size:20px;" onclick="location.href='logout.php'"></input><br>
</center>
</body>
</html-->

