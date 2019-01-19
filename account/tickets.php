<?php
session_start();
//$conn=mysqli_connect($servername,$username,$password,$dbname);
//if(!$conn){die("Connection Failed:".mysqli_connect_error());}
include ('db_conn.php'); // 匯入連線檔案
if(@$_SESSION["identifier"]==2){
	include 'header_ad.html';
}
else if(@$_SESSION["identifier"]==1){
	include 'header_cl.html';
}
else{
	include 'header.html';
}
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

<section class="clTable">
  <h1>所有票</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
            <th>編號</th>
            <th>起始站</th>
            <th>終點站</th>
            <th>價格</th>
            <th>現在數量</th>
            <th>發行人</th>        
            <th>原始數量</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
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
            
                echo '
                <tr>
                    <td>'. $ticket_id .'</td>
                    <td>'.$start.'</td>
                    <td>'.$end.'</td>
                    <td>'.$price.'</td>
                    <td>'. $amount_current .'</td>
                    <td>'. $ad_id .'</td>
                    <td>'. $amount_origin .'</td>
                </tr>';
            }
        ?>
      </tbody>
    </table>
  </div>
</section>

<!--
    <center><h1>所有票</h1></center>
    <hr size="10px" align="center" width="100%">
    <div id="tt">
    <center><table BORDER=1 WIDTH=50% HEIGHT=100> 
        <tr>
            <th>編號</th>
            <th>起始站</th>
            <th>終點站</th>
            <th>價格</th>
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
            $start = $row['start'];
            $end = $row['end'];
            $price = $row['price'];
			$amount_origin = $row['amount_origin'];
        
            echo '
            <tr>
                <td>'. $ticket_id .'</td>
                <td>'.$start.'</td>
                <td>'.$end.'</td>
                <td>'.$price.'</td>
                <td>'. $amount_current .'</td>
                <td>'. $ad_id .'</td>
				<td>'. $amount_origin .'</td>
            </tr>';
        }
    ?>
</table></center><br>
 -->
</body>
</html>

<?php
include 'footer_ad.html';
?>