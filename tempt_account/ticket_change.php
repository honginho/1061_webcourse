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
        $sql = "SELECT * FROM tickets"; //SQL 語法
        $result = mysqli_query($conn, $sql);
    ?>
    <center><h1>修改票</h1></body></center>
    <hr size="10px" align="center" width="300%">
    <center><table BORDER=1 WIDTH=50% HEIGHT=100> 
        <tr>
            <th>編號</th>
            <th>現在數量</th>
            <th>發行人</th>
			<th>原始數量</th>
			<th>修改</th>
        </tr>
	<?php
        while ($row = mysqli_fetch_array ($result))
        {
            $ticket_id = $row['ticket_id'];
            $amount_current = $row['amount_current'];
            $ad_id = $row['ad_id'];
			$amount_origin = $row['amount_origin'];
        
            echo '<form action="change.php" method="post">
            <tr>
                <td>'. $ticket_id .'</td>
                <td>'. $amount_current .'</td>
                <td>'. $ad_id .'</td>
				<td>'. $amount_origin .'</td>
				<td><input type="radio" name="id" value="'.$ticket_id.'"></td>
            </tr>';
        }
    ?>
    
    </table></center>
	<center>
　    <br>
　    現在數量：<input type="text" name="amount_current"><br>
	  原始數量：<input type="text" name="amount_origin"><br>
　    <input type="submit" value="修改">
      <input type="reset" value="清除">
    </form>
	</center>
</body>
</html>

<?php
include 'footer_ad.html';
?>