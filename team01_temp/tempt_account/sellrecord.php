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
        $sql = "SELECT * FROM tickets where ad_id='$account'"; //SQL 語法
        $result = mysqli_query($conn, $sql);
    ?>
    <center><h1>銷售紀錄</h1></center>
    <hr size="10px" align="center" width="300%">
    <center><table BORDER=1 WIDTH=50% HEIGHT=100> 
        <tr>
            <th>編號</th>
            <th>現在數量</th>
            <th>原始數量</th>
			<th>銷售數量</th>
        </tr>
	<?php
        while ($row = mysqli_fetch_array ($result))
        {
            $ticket_id = $row['ticket_id'];
            $amount_current = $row['amount_current'];
			$amount_origin = $row['amount_origin'];
			$amount_sell = $amount_origin-$amount_current;
        
            echo '
            <tr>
                <td>'. $ticket_id .'</td>
                <td>'. $amount_current .'</td>
                <td>'. $amount_origin .'</td>
				<td>'. $amount_sell .'</td>
            </tr>';
        }
    ?>
    
    </table></center><br>
	<center><input type ="button" onclick="javascript:location.href='successlogin.php'" value="登入"></input></center>
</body>
</html>
<?php
include 'footer_ad.html';
?>