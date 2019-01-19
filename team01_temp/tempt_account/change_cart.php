<?php
session_start();
include ('db_conn.php'); // 匯入連線檔案
if($_SESSION["identifier"]!=1){
	header("Location:login.html" );
}
?>
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
	<head>
	<title>修改購物車</title>
	</head>
<body>
    <center><h1>修改購物車</h1></body></center>
    <hr size="10px" align="center" width="300%">
    <center><table BORDER=1 WIDTH=50% HEIGHT=100> 
        <tr>
            <th>編號</th>
            <th>已加入數量</th>
            <th>時間</th>
			<th>修改</th>
        </tr>
	<?php
        $sql = "SELECT * FROM cart"; //SQL 語法
        $result = mysqli_query($conn, $sql);
    
        while ($row = mysqli_fetch_array ($result))
        {
            $ticket_id = $row['ticket_id'];
            $amount = $row['amount'];
            $time = $row['time'];
        
            echo '<form action="cart_number.php" method="post">
            <tr>
                <td>'. $ticket_id .'</td>
                <td>'. $amount .'</td>
                <td>'. $time .'</td>
				<td><input type="radio" name="time" value="'.$time.'"></td>
            </tr>';
        }
    ?>
    
    </table></center>
	<center>
　    <br>
<?php echo $amount;?>
　    修改數量：<input type="text" name="amount_change"><br><br>
	  <input type="hidden" name="amount_origin" value=<?php echo $amount;?>>
　    <input type="submit" value="送出"/>
      <input type="reset" value="清除">
    </form>
	</center>
</body>
</html>