<?php
	include ('db_conn.php'); // 匯入連線檔案
	$amount_current=$_POST["amount_current"];
	$amount_origin=$_POST["amount_origin"];
	$id=$_POST["id"];
	
	
	$sql = "UPDATE tickets set amount_current='$amount_current',amount_origin='$amount_origin' WHERE ticket_id = '$id'";
		mysqli_query($conn, $sql);
		
	    header("Location:successlogin.php" );
		mysqli_close($conn);
?>