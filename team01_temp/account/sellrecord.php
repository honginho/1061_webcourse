<?php
session_start();
include ('db_conn.php'); // 匯入連線檔案
if($_SESSION['identifier']!=2){
	header("Location:login.html" );
}
include 'header_ad.html';
?>
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
	<head>
	<title>銷售紀錄</title>
	</head>
<body>
    <?php
	    $account=$_SESSION['account'];
        $sql = "SELECT ticket_id FROM tickets where ad_id='$account'"; //SQL 語法
        $result = mysqli_query($conn, $sql);
    ?>
    <center><h1>銷售紀錄</h1></center>
    <hr size="10px" align="center" width="100%">
    <div id="tt"
    <center><table BORDER=1 WIDTH=50% HEIGHT=100> 
        <tr>
            <th>編號</th>
            <th>購買者</th>
            <th>數量</th>
			<th>購買時間</th>
        </tr>
	<?php
        while ($row = mysqli_fetch_array ($result))
        {
			//echo "$row[0]"."<br>";
            $sql1 = "SELECT * FROM purchase where ticket_id='$row[0]'"; //SQL 語法
            $result1 = mysqli_query($conn, $sql1);
			while ($row1 = mysqli_fetch_array ($result1)){
				$client_id = $row1['client_id'];
				$amount = $row1['amount'];
				$time = $row1['time'];
				
				echo '
				<tr>
					<td>'. $row[0] .'</td>
					<td>'. $client_id .'</td>
					<td>'. $amount .'</td>
					<td>'. $time .'</td>
				</tr>';
			}
        }
    ?>
    </table></center></div><br>
</body>
</html>
<?php
include 'footer_ad.html';
?>