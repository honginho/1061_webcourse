<?php
	include ('db_conn.php'); // 匯入連線檔案
	$amount_current=$_POST["amount_current"];
	$amount_origin=$_POST["amount_origin"];

	$start=$_POST["start"];//起始
	$end=$_POST["end"];//終點
	$price=$_POST["price"];//價格


	$id=$_POST["id"];
	
	
	$sql = "UPDATE tickets set amount_current='$amount_current',amount_origin='$amount_origin' ,start='$start' ,end='$end' ,price='$price' WHERE ticket_id = '$id'";
		mysqli_query($conn, $sql);
		
	    header("Location:successlogin.php" );
		mysqli_close($conn);
?>