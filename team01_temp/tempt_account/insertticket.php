<?php
session_start();
include 'db_conn.php'; // 匯入連線檔案
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("Connection Failed:".mysqli_connect_error());} 
if($_SESSION["identifier"]==2){
include 'header_ad.html';
echo '
<html>
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<head>
<title>新增票</title>
</head>
<body>
<h1><center>';echo $_SESSION["account"];echo '新增票</center></h1>
<center>
<form action="" method="POST">
票編號:<br>
<input type="text" name="ticket_id"/>
<br>
票數量:<br>
<input type="text" name="amount_origin"/>
<br>
<input type="submit" value="新增票" >
<input type="reset" value="清除" >
</form>
</center>
</body>
</html>';

include 'footer_ad.html';
} 
else{ 
header("Location:login.html" );
}
if($_POST){
$ticket_id=$_POST["ticket_id"];
$amount_origin=$_POST["amount_origin"];
$account=$_SESSION["account"];
$amount_current=$_POST["amount_origin"];
$sql="INSERT INTO tickets (ticket_id,amount_current,ad_id,amount_origin) VALUES ('$ticket_id','$amount_origin','$account','$amount_current')";
if(mysqli_query($conn,$sql)){
  header("Location:tickets.php" );
}
else{
  echo "Error:".$sql."<br>".$conn->error;
}
mysqli_close($conn);
} 
?>