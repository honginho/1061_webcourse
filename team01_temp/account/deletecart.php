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
<title>刪除購物車</title>
</head>
<body>
<?php
    $account=$_SESSION["account"];
    $sql = "SELECT * FROM cart where client_id='$account'"; //SQL 語法

    $result = mysqli_query($conn, $sql);
    if($result){
        //header("Location:showcart.php" );
    }
    else{
        $conn->error;
    }
?>

<section class="clTable">
  <h1>刪除購物車</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
            <th>編號</th>
            <th>起始站</th>
            <th>終點站</th>
            <th>已加入數量</th>
            <th>時間</th>
            <th>刪除</th>
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
                $time = $row['time'];
              $start = $row['start'];
                $end = $row['end'];
                echo '<form action="cl_delete.php" method="post">
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
    <div class="tbl-btn">
        <input type ="submit" value="刪除"></input>
        <input type ="reset" value="清除"></input>
    </div>
</section>

<!--
<center><h1>刪除購物車</h1></body></center>
<hr size="10px" align="center" width="100%">
<div id="tt">
<center><table BORDER=1 WIDTH=50% HEIGHT=100> 
    <tr>
        <th>編號</th>
        <th>起始站</th>
        <th>終點站</th>
        <th>已加入數量</th>
        <th>時間</th>
              <th>刪除</th>
    </tr>
<?php
    while ($row = mysqli_fetch_array ($result))
    {
        $ticket_id = $row['ticket_id'];
        $amount = $row['amount'];
        $time = $row['time'];
      $start = $row['start'];
        $end = $row['end'];
        echo '<form action="cl_delete.php" method="post">
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

</table></center></div>
<center>
　    <br>
　    <input id="butsty" type="submit" value="刪除">
  <input id="butsty" type="reset" value="清除">
</form>
</center>
 -->
</body>
</html>

<?php
include 'footer_ad.html';
?>