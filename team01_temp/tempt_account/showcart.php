<?php
include ('db_conn.php'); // 匯入連線檔案
session_start();
if($_SESSION["identifier"]!=1){
header("Location:login.html" );
}
?>
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
	<head>
	<title>購物車</title>
	</head>
<body>
    <?php
        $sql = "SELECT * FROM cart"; //SQL 語法
        $result = mysqli_query($conn, $sql);
    ?>
    <center><h1><?php echo $_SESSION["account"];?>的購物車清單</h1></center>
    <hr size="10px" align="center" width="300%">
    <center><table BORDER=1 WIDTH=50% HEIGHT=100> 
        <tr>
            <th>編號</th>
            <th>數量</th>
            <th>時間</th>
        </tr>
	<?php
        while ($row = mysqli_fetch_array ($result))
        {
            $ticket_id = $row['ticket_id'];
            $amount = $row['amount'];
    
			$time = $row['time'];
        
            echo '
            <tr>
                <td>'. $ticket_id .'</td>
                <td>'. $amount .'</td>
				<td>'. $time .'</td>
            </tr>';
        }
    ?>
    
    </table></center><br>
	<center><input type ="button" onclick="javascript:location.href='successlogin.php'" value="登入"></input></center>
</body>
</html>