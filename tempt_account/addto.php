<?php
	include ('db_conn.php'); // 匯入連線檔案
	session_start();
	//$conn=mysqli_connect($servername,$username,$password,$dbname);
	//if(!$conn){die("Connection Failed:".mysqli_connect_error());}

	
    $number=(int)$_POST["number"];
	$account=$_SESSION['account'];
	$ticket_id=$_POST["id"];
	date_default_timezone_set('Asia/Taipei');
	$datetime =date('Y-m-d H:i:s');
	// echo "/*"."$_POST['number']";
	$sql="INSERT INTO cart (ticket_id,client_id,amount,time) VALUES ('$ticket_id','$account','$number','$datetime')";

	if(mysqli_query($conn,$sql)){
		header("Location:showcart.php" );
	}
	else{
		echo "Error:".$sql."<br>".$conn->error;
	}
	mysqli_close($conn);
?>