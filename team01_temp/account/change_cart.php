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
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<head>
<title>修改購物車</title>
</head>
<body>

<section class="clTable">
  <h1>修改購物車</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
            <th>編號</th>
            <th>起始站</th>
            <th>終點站</th>
            <th>已加入數量</th>
            <th>時間</th>
            <th>修改</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <?php
            $account=$_SESSION["account"];
            $sql = "SELECT * FROM cart where client_id='$account'"; //SQL 語法
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array ($result))
            {
                $ticket_id = $row['ticket_id'];
                $amount = $row['amount'];
                $time = $row['time'];
                $start = $row['start'];
                $end = $row['end'];
                echo '<form action="cart_number.php" method="post">
                <tr>
                    <td>'. $ticket_id .'</td>
                    <td>'. $start.'</td>
                    <td>'. $end.'</td>
                    <td>'. $amount .'</td>
                    <td>'. $time .'</td>
                    <td><input type="radio" name="time" value="'.$time.'"></td>
                </tr>'; 
            }
        ?>
      </tbody>
    </table>
  </div>
　  <p>
        修改數量：
        <input id="insert" type="text" name="amount_change">
    </p>
    <div class="tbl-btn">
        <input type="hidden" name="amount_origin" value=<?php echo @$amount;?>>
        <input type ="submit" value="送出"></input>
        <input type ="reset" value="清除"></input>
    </div>
</section>

<!--
<center><h1>修改購物車</h1></body></center>
<hr size="10px" align="center" width="100%">
<div id="tt">
<center><table BORDER=1 WIDTH=50% HEIGHT=100> 
    <tr>
        <th>編號</th>
        <th>起始站</th>
        <th>終點站</th>
        <th>已加入數量</th>
        <th>時間</th>
        <th>修改</th>
    </tr>
<?php
    $account=$_SESSION["account"];
    $sql = "SELECT * FROM cart where client_id='$account'"; //SQL 語法
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array ($result))
    {
        $ticket_id = $row['ticket_id'];
        $amount = $row['amount'];
        $time = $row['time'];
        $start = $row['start'];
        $end = $row['end'];
        echo '<form action="cart_number.php" method="post">
        <tr>
            <td>'. $ticket_id .'</td>
            <td>'. $start.'</td>
            <td>'. $end.'</td>
            <td>'. $amount .'</td>
            <td>'. $time .'</td>
            <td><input type="radio" name="time" value="'.$time.'"></td>
        </tr>'; 
    }
?>

</table></center>
<center>
　    <br>
　    <p style="font-family: "Microsoft JhengHei";">修改數量：<input id="insert"  type="text" name="amount_change"><br><br></p>
  <input type="hidden" name="amount_origin" value=<?php echo @$amount;?>>
　    <input id="butsty" style="width:15%;" type="submit" value="送出"/>
  <input id="butsty" style="width:15%;" type="reset" value="清除">
</form>
</center>
 -->
</body>
</html>

<?php
include 'footer_ad.html';
?>