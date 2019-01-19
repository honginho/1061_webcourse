<?php
session_start();
include ('db_conn.php'); // 匯入連線檔案
date_default_timezone_set('Asia/Taipei');
$username=$_SESSION['account'];
$message=$_POST["message"];
$datetime =date('Y-m-d H:i:s');
$sql="INSERT INTO message (client_id,content,time) VALUES ('$username','$message','$datetime')";
if(mysqli_query($conn,$sql)){
		header('Location:publisher.php');
	}
	else{
		echo "Error:".$sql."<br>".$conn->error;
	}
mysqli_close($conn);
?>