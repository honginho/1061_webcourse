<?php
session_start();
include ('db_conn.php'); // 匯入連線檔案
if($_SESSION["identifier"]!=2 && $_SESSION["identifier"]!=1){
header("Location:../index.html" );
}
else if($_SESSION["identifier"]==2){
include 'header_ad.html';	
}
else{
include 'header_cl.html';
}
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
	<head>
	<title>留言板</title>
	</head>
<body>

<?php
        $sql = "SELECT * FROM message"; //SQL 語法
        $result = mysqli_query($conn, $sql);
?>

<section class="clTable">
  <h1>留言版</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
            <th>留言人</th>
            <th>內容</th>
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
                    $client_id = $row['client_id'];
                    $content = $row['content'];
                    $time = $row['time'];
                
                    echo '
                    <tr>
                        <td>'. $client_id .'</td>
                        <td>'. $content .'</td>
                        <td>'. $time .'</td>
                    </tr>';
                    
                }
                echo "</table><br>";
        ?>
      </tbody>
    </table>
  </div>
    <form action="time.php" method="post">
        <p style="padding:30px 0 5px;font-size: 30px;">
            content:
        </p>
        <center>
            <textarea cols="50" rows="15" name="message"></textarea>
        </center>
        <div class="tbl-btn">
            <input type ="submit" value="送出"></input>
            <input type ="reset" value="清除"></input>
        </div>
    </form>
</section>

<!--
    <center><h1>留言板</h1></center>
    <hr size="10px" align="center" width="100%">
    <div id="tt">
    <center><table BORDER=1 WIDTH=50% HEIGHT=100> 
        <tr>
            <th>留言人</th>
            <th>內容</th>
            <th>時間</th>
        </tr>
<?php
        while ($row = mysqli_fetch_array ($result))
        {
            $client_id = $row['client_id'];
            $content = $row['content'];
            $time = $row['time'];
        
            echo '
            <tr>
                <td>'. $client_id .'</td>
                <td>'. $content .'</td>
                <td>'. $time .'</td>
            </tr>';
			
        }
		echo "</table><br>";
?>
<form action="time.php" method="post">
  <p style="font-size: 1.5em ; font-weight: 600;">  content:<br></p>
	<textarea cols="50" rows="15" name="message"></textarea><br>
     <input id="butsty" style="width:15%;" type="submit" value="送出" />
	 <input id="butsty" style="width:15%;" type="reset" value="清除" />	 
</form>
</center>
 -->
</body>
</html>
<?php
include ('footer_ad.html');

?>