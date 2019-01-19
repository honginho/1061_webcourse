<?php
	include 'db_conn.php'; // 匯入連線檔案
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	if(!$conn){die("Connection Failed:".mysqli_connect_error());}
	$id=$_POST["id"];
		$sql = "DELETE FROM tickets WHERE ticket_id = '$id'";
		mysqli_query($conn, $sql);

	header('location: successlogin.php');
	mysqli_close($conn);
?>