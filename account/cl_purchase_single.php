<?php
	include ('db_conn.php'); // 匯入連線檔案
	session_start();
	
	$time=$_POST["time"];
	$account=$_SESSION["account"];
	/*$start = $_POST["start"];
	$end = $_POST["end"];*/
	date_default_timezone_set('Asia/Taipei');
	$datetime =date('Y-m-d H:i:s');

	$sql = "SELECT ticket_id,amount,start,end FROM cart where client_id = '$account' and time='$time'"; //SQL 語法
    $amount_origin = mysqli_query($conn, $sql);
	$row1 = mysqli_fetch_array ($amount_origin);//row1[0]=ticket_id row1[1]=amount
	
	$sql1 = "DELETE FROM cart WHERE client_id = '$account' and time='$time'";
	mysqli_query($conn, $sql1);
	

	//$sql2="INSERT INTO purchase (ticket_id,client_id,amount,time,start,end) VALUES ('$row1[0]','$account','$row1[1]','$datetime')";

	$sql2="INSERT INTO purchase (ticket_id,client_id,amount,time,start,end) VALUES ('$row1[0]','$account','$row1[1]','$datetime','$row1[2]','$row1[3]')";

	mysqli_query($conn, $sql2);
	
	//header("Location: word.php");
	header('location: showcart.php');
	mysqli_close($conn);
?>