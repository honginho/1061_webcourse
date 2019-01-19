<?php
session_start();
include ('db_conn.php'); // 匯入連線檔案
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("Connection Failed:".mysqli_connect_error());} 
if($_SESSION["identifier"]==2){
include ('header_ad.html');
echo '
<html>
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<head>
<title>新增票</title>
</head>
<body>
<h1><center>';echo $_SESSION["account"];echo '新增票</center></h1>
<center>
<form id="form" style="width: 25%; font-size: 1.5em;padding:1.5%" action="" method="POST">
票編號:<br>
<input id="insert" type="text" name="ticket_id"/>
<br><br>
票數量:<br>
<input id="insert" type="text" name="amount_origin"/>
<br><br>

起始站:
<select name="start" style="font-size: 20px;">
<option value ="blank"></option>
<option value ="taoyuan">桃園</option>
<option value ="taipei">台北</option>
<option value="hsinchu">新竹</option>
<option value="taichung">台中</option>
<option value="changhua">彰化</option><option value="nantou">南投</option>
<option value="chiayi">嘉義</option>
<option value="tainan">台南</option>
<option value="koahsiung">高雄</option>
<option value="pingtung">屏東</option>
</select><br><br>

終點站:
<select name="end" style="font-size: 20px;">
<option value ="blank"></option>
<option value ="taoyuan">桃園</option>
<option value ="taipei">台北</option>
<option value="hsinchu">新竹</option>
<option value="taichung">台中</option>
<option value="changhua">彰化</option><option value="nantou">南投</option>
<option value="chiayi">嘉義</option>
<option value="tainan">台南</option>
<option value="koahsiung">高雄</option>
<option value="pingtung">屏東</option>
</select><br><br>

價格:<br>
<input id="insert" type="text" name="price"/><br>

<input id="butsty" style="width: auto;" type="submit" value="新增票" >
<input id="butsty" style="width: auto;" type="reset" value="清除" >
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
$start = $_POST["start"];
$end = $_POST["end"];
$price = $_POST["price"];
$sql="INSERT INTO tickets (ticket_id,amount_current,ad_id,amount_origin,start,end,price) VALUES ('$ticket_id','$amount_origin','$account','$amount_current','$start','$end','$price')";
if(mysqli_query($conn,$sql)){
  header("Location:tickets.php" );
}
else{
  echo "Error:".$sql."<br>".$conn->error;
}
mysqli_close($conn);
} 
?>