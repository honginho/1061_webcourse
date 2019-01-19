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
<title>購買紀錄</title>
</head>
<body>
<?php
    $client_id=$_SESSION['account'];
    $get_cl_purchase="SELECT * FROM `purchase` WHERE `client_id`='$client_id'"; //SQL 語法
    $result = mysqli_query($conn, $get_cl_purchase);
?>

<section class="clTable">
  <h1><?php echo $_SESSION["account"];?>&nbsp;的購買紀錄</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
            <th>編號</th>
            <th>起始站</th>
            <th>終點站</th>
            <th>數量</th>
            <th>時間</th>
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
                $time = $row['time'];
            
                echo '
                <tr>
                    <td>'. $ticket_id .'</td>
                    <td>'. $start.'</td>
                    <td>'. $end.'</td>
                    <td>'. $amount .'</td>
                    <td>'. $time .'</td>
                </tr>';
            }
        ?>
      </tbody>
    </table>
  </div>
</section>

<!--
<center><h1><?php echo $_SESSION["account"];?>的購買紀錄</h1></center>
<hr size="10px" align="center" width="100%">
<div id ="tt">
<center><table BORDER=1 WIDTH=50% HEIGHT=100> 
    <tr>
        <th>編號</th>
        <th>起始站</th>
        <th>終點站</th>
        <th>數量</th>
        <th>時間</th>
    </tr>
<?php
    while ($row = mysqli_fetch_array ($result))
    {
        $ticket_id = $row['ticket_id'];
        $amount = $row['amount'];
        $start = $row['start'];
        $end = $row['end'];
        $time = $row['time'];
    
        echo '
        <tr>
            <td>'. $ticket_id .'</td>
            <td>'. $start.'</td>
            <td>'. $end.'</td>
            <td>'. $amount .'</td>
            <td>'. $time .'</td>
        </tr>';
    }
?>

</table></center></div><br>
 -->
</body>
</html>