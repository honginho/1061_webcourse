<?php
session_start();
include ('db_conn.php'); // 匯入連線檔案
if($_SESSION["identifier"]!=1){
	header("Location:login.html" );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>加入購物車</title>
</head>
<body>
<?php
        $sql = "SELECT * FROM tickets"; //SQL 語法
        $result = mysqli_query($conn, $sql);
    ?>
    <center><h1>加入購物車</h1></body></center>
    <hr size="10px" align="center" width="300%">
    <center><table BORDER=1 WIDTH=50% HEIGHT=100> 
        <tr>
            <th>編號</th>
            <th>現在數量</th>
            <th>發行人</th>
			<th>原始數量</th>
			<th>加入</th>
			<th>數量</th>
        </tr>
	<?php
        while ($row = mysqli_fetch_array ($result))
        {
            $ticket_id = $row['ticket_id'];
            $amount_current = $row['amount_current'];
            $ad_id = $row['ad_id'];
			$amount_origin = $row['amount_origin'];
        
            echo '<form action="addto.php" method="post">
            <tr>
                <td>'. $ticket_id .'</td>
                <td>'. $amount_current .'</td>
                <td>'. $ad_id .'</td>
				<td>'. $amount_origin .'</td>
				<td><input type="radio" name="id" value="'.$ticket_id.'"></td>
				<td><input id="number" type="number" name="number"></td>
				<td><input type="submit" value="送出">
				<input type="reset" value="清除"></td>
            </tr></form>';
        }
    ?>
    </table></center><br>
</body>
</html>