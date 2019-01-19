<?php
session_start();
include ('db_conn.php'); // 匯入連線檔案
if($_SESSION["identifier"]!=1){
	header("Location:../index.html" );
}
include 'header_cl.html';
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

<section class="clTable">
  <h1>加入購物車</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
            <th>編號</th>
            <th>現在數量</th>
            <th>發行人</th>
            <th>起始站</th>
            <th>終點站</th>
            <th>原始數量</th>
            <th>價錢</th>
            <th>加入</th>
            <th>數量</th>
            <th style="opacity: 0;">按扭</th>
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
            
                echo '<form action="addto.php" method="post">
                <input type="text" value="'. $start . '" name="start" hidden=true />
                <input type="text" value="'. $end . '" name="end" hidden=true />
                <input type="text" value="'. $price . '" name="price" hidden=true />
                <tr>
                    <td>'. $ticket_id .'</td>
                    <td>'. $amount_current .'</td>
                    <td>'. $ad_id .'</td>
                    <td>'. $start.'</td>
                    <td>'. $end.'</td>
                    <td>'. $amount_origin .'</td>
                    <td>'.$price.'</td>
                    <td><input type="radio" name="id" value="'.$ticket_id.'"></td>
                    <td><input id="number" type="number" name="number"></td>
                    <td><input type="submit" value="送出">
                    <input type="reset" value="清除"></td>
                </tr></form>';
            }
        ?>
      </tbody>
    </table>
  </div>
</section>

<!--
    <center><h1>加入購物車</h1></body></center>
    <hr size="10px" align="center" width="100%">
<div id="tt">
    <center><table BORDER=1 WIDTH=50% HEIGHT=100> 
        <tr>
            <th>編號</th>
            <th>現在數量</th>
            <th>發行人</th>
            <th>起始站</th>
            <th>終點站</th>
            <th>原始數量</th>
            <th>價錢</th>
			<th>加入</th>
			<th>數量</th>
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
        
            echo '<form action="addto.php" method="post">
            <input type="text" value="'. $start . '" name="start" hidden=true />
            <input type="text" value="'. $end . '" name="end" hidden=true />
            <input type="text" value="'. $price . '" name="price" hidden=true />
            <tr>
                <td>'. $ticket_id .'</td>
                <td>'. $amount_current .'</td>
                <td>'. $ad_id .'</td>
                <td>'. $start.'</td>
                <td>'. $end.'</td>
				<td>'. $amount_origin .'</td>
                <td>'.$price.'</td>
				<td><input type="radio" name="id" value="'.$ticket_id.'"></td>
				<td><input id="number" type="number" name="number"></td>
                <td><input type="submit" value="送出">
		        <input type="reset" value="清除"></td>
            </tr></form>';
        }
    ?>      
    </table></center><br>
    </div>
 -->
</body>
</html>
<?php
include 'footer_ad.html';
?>