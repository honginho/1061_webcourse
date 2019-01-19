<?php
	include ('db_conn.php'); // 匯入連線檔案
	session_start();
	//$conn=mysqli_connect($servername,$username,$password,$dbname);
	//if(!$conn){die("Connection Failed:".mysqli_connect_error());}

	
    $number=(int)$_POST["number"];
	$account=$_SESSION['account'];
	$ticket_id=$_POST["id"];
	$start = $_POST["start"];
	$end = $_POST["end"];
	$price = $_POST["price"];
	date_default_timezone_set('Asia/Taipei');
	$datetime =date('Y-m-d H:i:s');
	// echo "/*"."$_POST['number']";
	$sql="INSERT INTO cart (ticket_id,client_id,start,end,amount,price,time) VALUES ('$ticket_id','$account','$start','$end','$number','$price','$datetime')";
	
	$sql1 = "SELECT amount_current FROM tickets where ticket_id = '$ticket_id'"; //SQL 語法
    $amount_origin = mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_array ($amount_origin);//row1[0]=數量
	$diff=$row1[0]-$number;
	if($diff<0){
		header("Location:addcart.php");
		mysqli_close($conn);
	}
	else{
        $sql2 = "UPDATE tickets set amount_current='$diff' WHERE ticket_id = '$ticket_id'";
		mysqli_query($conn, $sql2);
	
	
	
	if(mysqli_query($conn,$sql)){
		header("Location:showcart.php" );
	}   
	else{
		echo "Error:".$sql."<br>".$conn->error;
	}
	mysqli_close($conn);		
	}
?>