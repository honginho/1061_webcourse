<?php
session_start();
include ('db_conn.php'); // 匯入連線檔案
if($_SESSION["identifier"]==1 || $_SESSION["identifier"]==""){
	header("Location:login.html" );
}
include 'header_ad.html';

?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<head>
<title>修改票</title>
</head>
<body>
<?php
    $account=$_SESSION["account"];
    $sql = "SELECT * FROM tickets where ad_id='$account'"; //SQL 語法
    $result = mysqli_query($conn, $sql);
?>
<center><h1>修改票</h1></body></center>
<hr size="10px" align="center" width="100%">
<div id="tt">
<center><table BORDER=1 WIDTH=50% HEIGHT=100> 
    <tr>
        <th>編號</th>
        <th>現在數量</th>
        <th>發行人</th>
        <th>起始站</th>
        <th>終點站</th>
        <th>價格</th>
        <th>原始數量</th>         
        <th>修改</th>
    </tr>
<?php
    while ($row = mysqli_fetch_array ($result))
    {
        $ticket_id = $row['ticket_id'];
        $amount_current = $row['amount_current'];
        $ad_id = $row['ad_id'];
        $start = $row['start']; 
        $end = $row['end'];
        $price = $row['price'];
        $amount_origin = $row['amount_origin'];
    
        echo '<form action="change.php" method="post">   	
        	
        <tr>
            <td>'. $ticket_id .'</td>
            <td>'. $amount_current .'</td>
            <td>'. $ad_id .'</td>
            <td>'. $start.'</td>
            <td>'.$end.'</td>
            <td>'.$price.'</td>
            <td>'.$amount_origin .'</td>
            <td><input type="radio" name="id" value="'.$ticket_id.'"></td>
        </tr>';
    }
?>

</table></center>
<center>
　    <br>
　    現在數量：<input id="butsty" type="text" name="amount_current"><br>
  原始數量：<input id="butsty" type="text" name="amount_origin"><br>
              <input id="butsty" type="text" name="start" hidden=true />
              <input id="butsty" type="text" name="end" hidden=true />
              <input id="butsty " type="text" name="price" hidden=true />
起始站:
  <select name="start" id="start" style="font-size: 20px;">
  <option value ="blank"></option>
  <option value ="taoyuan">桃園</option>
  <option value ="taipei">台北</option>
  <option value="hsinchu">新竹</option>
  <option value="taichung">台中</option>
  <option value="changhua">彰化</option>
  <option value="nantou">南投</option>
  <option value="chiayi">嘉義</option>
  <option value="tainan">台南</option>
  <option value="koahsiung">高雄</option>
  <option value="pingtung">屏東</option>
  </select><br>

  終點站:
  <select id="end" name="end" style="font-size: 20px;">
  <option value ="blank"></option>
  <option value ="taoyuan">桃園</option>
  <option value ="taipei">台北</option>
  <option value="hsinchu">新竹</option>
  <option value="taichung">台中</option>
  <option value="changhua">彰化</option>
  <option value="nantou">南投</option>
  <option value="chiayi">嘉義</option>
  <option value="tainan">台南</option>
  <option value="koahsiung">高雄</option>
  <option value="pingtung">屏東</option>
  </select><br>

  價格:<input name="price" id="butsty" type="text" name="price"/><br>
　    	<input id="butsty" type="submit" value="修改">
  		<input id="butsty" type="reset" value="清除">
</form>
</center>
</div>
</body>
</html>
<?php
include 'footer_ad.html';
?>