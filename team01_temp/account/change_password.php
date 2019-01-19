<?php
	include ('db_conn.php'); // 匯入連線檔案
	session_start();
	$newpassword = $_POST['newpassword'];
	$account=$_SESSION['account'];
	$sql="UPDATE all_account SET password=MD5('$newpassword') WHERE account='$account'";

	if(mysqli_query($conn,$sql)){
		
		header("Location:tickets.php");
	}
	else{
		echo "Error:".$sql."<br>".$conn->error;
	}
	mysqli_close($conn);
?>