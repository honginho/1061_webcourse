<?php
include ('db_conn.php'); // 匯入連線檔案
session_start();
if($_SESSION["identifier"]!=1){
header("Location:../index.html" );
}
include 'header_cl.html';
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<head>
<title>購物車</title>
</head>
<body>
<?php
    $account=$_SESSION["account"];
    $sql = "SELECT * FROM cart where client_id='$account'"; //SQL 語法
    $result = mysqli_query($conn, $sql);
?>

<section class="clTable">
  <h1><?php echo $_SESSION["account"];?>&nbsp;的購物車清單</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
            <th>編號</th>
            <th>起始站</th>
            <th>終點站</th>
            <th>數量</th>
            <th>時間</th>
            <th>價錢</th>
            <th>選擇結帳</th>
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
                $amount = $row['amount'];
                $start = $row['start'];
                $end = $row['end'];
                $price = $row['price'];
                $time = $row['time'];
            
                echo '<form action="cl_purchase_single.php" method="post">
                <tr>
                    <td>'. $ticket_id .'</td>            
                    <td>'. $start.'</td>
                    <td>'. $end.'</td>
                    <td>'. $amount .'</td>
                    <td>'. $time .'</td>
                    <td>'. $price.'</td>
                    <td><input type="radio" name="time" value="'.$time.'"></td>
                </tr>';
            }
        ?>
      </tbody>
    </table>
  </div>
    <div class="tbl-btn">
        <input type ="button" onclick="javascript:location.href='cl_purchase.php'" value="全部購買"></input>
        <input type ="submit" value="確認單筆購買"></input>
        <input type ="button" onclick="javascript:location.href='showcart.php'" value="繼續購物"></input>
    </div>
</section>

<!--
<center><h1><?php echo $_SESSION["account"];?>的購物車清單</h1></center>
<hr size="10px" align="center" width="100%">
<div id="tt">
<center><table BORDER=1 WIDTH=50% HEIGHT=100> 
    <tr>
        <th>編號</th>
        <th>起始站</th>
        <th>終點站</th>
        <th>數量</th>
        <th>時間</th>
        <th>價錢</th>
        <th>選擇結帳</th>
    </tr>
<?php
    while ($row = mysqli_fetch_array ($result))
    {
        $ticket_id = $row['ticket_id'];
        $amount = $row['amount'];
        $start = $row['start'];
        $end = $row['end'];
        $price = $row['price'];
        $time = $row['time'];
    
        echo '<form action="cl_purchase_single.php" method="post">
        <tr>
            <td>'. $ticket_id .'</td>            
            <td>'. $start.'</td>
            <td>'. $end.'</td>
            <td>'. $amount .'</td>
            <td>'. $time .'</td>
            <td>'. $price.'</td>
            <td><input type="radio" name="time" value="'.$time.'"></td>
        </tr>';
    }
?>
</table></center>
</div><br>
	<center>
        <input id="butsty" type ="button" onclick="javascript:location.href=cl_purchase.php" value="全部購買"></input>
        <input id="butsty" type ="submit" value="確認單筆購買"></input>
        <input id="butsty" type ="button" onclick="javascript:location.href=showcart.php" value="繼續購物"></input>
    </center>
 -->
</body>
</html>

<?php
include 'footer_ad.html';
?>