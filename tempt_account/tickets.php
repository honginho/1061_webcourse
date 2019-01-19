<?php
include ('db_conn.php'); // 匯入連線檔案
//$conn=mysqli_connect($servername,$username,$password,$dbname);
//if(!$conn){die("Connection Failed:".mysqli_connect_error());}
include 'header_ad.html';
?>
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
	<head>
	<title>所有票</title>
	</head>
<body>
    <?php
        $sql = "SELECT * FROM tickets"; //SQL 語法
        $result = mysqli_query($conn, $sql);
    ?>
    <center><h1>所有票</h1></center>
    <hr size="10px" align="center" width="300%">
    <center><table BORDER=1 WIDTH=50% HEIGHT=100> 
        <tr>
            <th>編號</th>
            <th>現在數量</th>
            <th>發行人</th>
			<th>原始數量</th>
        </tr>
	<?php
        while ($row = mysqli_fetch_array ($result))
        {
            $ticket_id = $row['ticket_id'];
            $amount_current = $row['amount_current'];
            $ad_id = $row['ad_id'];
			$amount_origin = $row['amount_origin'];
        
            echo '
            <tr>
                <td>'. $ticket_id .'</td>
                <td>'. $amount_current .'</td>
                <td>'. $ad_id .'</td>
				<td>'. $amount_origin .'</td>
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