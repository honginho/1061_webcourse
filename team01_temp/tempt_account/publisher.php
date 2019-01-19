<?php
session_start();
include ('db_conn.php'); // 匯入連線檔案
if($_SESSION["identifier"]!=2 && $_SESSION["identifier"]!=1){
header("Location:login.html" );
}
include 'header_ad.html';
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
    <center><h1>留言板</h1></center>
    <hr size="10px" align="center" width="300%">
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
    content:<br>
	<textarea cols="50" rows="15" name="message"></textarea><br>
     <input type="submit" value="送出" />
	 <input type="reset" value="清除" />	 
</form>
</center>
</body>
</html>
<?php
include 'footer_ad.html';

?>