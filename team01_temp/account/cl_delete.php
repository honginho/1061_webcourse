<?php
	session_start();
	include ('db_conn.php'); // 匯入連線檔案
	//$conn=mysqli_connect($servername,$username,$password,$dbname);
	//if(!$conn){die("Connection Failed:".mysqli_connect_error());}
	$time=$_POST["time"];
	$account=$_SESSION['account'];
	date_default_timezone_set('Asia/Taipei');



	$get_cart_amount="SELECT amount,ticket_id FROM cart where client_id = '$account' and time='$time'"; //SQL 語法;
	$amount_origin = mysqli_query($conn, $get_cart_amount);
	//row1[0]是cart裡那個時間點的數量用來delete cart和加回ticket
	$row1 = mysqli_fetch_array ($amount_origin);


	$sql = "DELETE FROM cart WHERE time = '$time'";
	mysqli_query($conn, $sql);


	$sql2 ="SELECT amount_current FROM tickets WHERE ticket_id='$row1[1]'";
	$result2=mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_array ($result2);

	$diff=$row2[0]+$row1[0];
	

	$sql3 ="UPDATE tickets SET amount_current= '$diff' WHERE tickets.ticket_id = '$row1[1]'";
	$result3=mysqli_query($conn, $sql3);
	echo '刪除成功';
	header("Location:showcart.php" );
	//header('location: successlogin.php');
	mysqli_close($conn);	
?>