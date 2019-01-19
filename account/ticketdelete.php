<?php
session_start();
include 'db_conn.php'; // 匯入連線檔案
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("Connection Failed:".mysqli_connect_error());}
if($_SESSION["identifier"]==1 || $_SESSION["identifier"]==""){
	header("Location:login.html" );
}
include 'header_ad.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>刪票</title>
</head>
<body>
<?php
        $account=$_SESSION["account"];
        $sql = "SELECT * FROM tickets where ad_id='$account'"; //SQL 語法
        $result = mysqli_query($conn, $sql);
    ?>
    <center><h1>刪票</h1></body></center>
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
			      <th>刪除</th>
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
        
            echo '<form action="delete.php" method="post">
            <tr>
                <td>'. $ticket_id .'</td>
                <td>'. $amount_current .'</td>
                <td>'. $ad_id .'</td>
                <td>'.$start.'</td>
                <td>'.$end.'</td>
                <td>'.$price.'</td>
				        <td>'. $amount_origin .'</td>
				<td><input type="radio" name="id" value="'.$ticket_id.'"></td>
            </tr>';
        }
    ?>
    </table></center><br>
	<center><input id="butsty" type="submit" value="刪除">
      <input id="butsty" type="reset" value="清除">
    </form></center>
    </div>
</body>
</html>

<?php
include 'footer_ad.html';
?>