<?php
session_start();
	include ('db_conn.php'); // 匯入連線檔案
	$time=$_POST["time"];
	$account=$_SESSION['account'];
	$amount_change=(int)$_POST['amount_change'];
	
	date_default_timezone_set('Asia/Taipei');
	$datetime =date('Y-m-d H:i:s');
	//$sql  = 'UPDATE `tickets` SET `amount_origin` =`$amount_origin`,`amount_current` =`$amount_current` WHERE `tickets`.`ticket_id` = `$id`';
	
	 $sql1 = "SELECT amount,ticket_id FROM cart where client_id = '$account' and time='$time'"; //SQL 語法
     $amount_origin = mysqli_query($conn, $sql1);
	 $row1 = mysqli_fetch_array ($amount_origin);
	 $diff=$row1[0]-$amount_change;
	 $sql = "UPDATE cart set amount='$amount_change',time='$datetime' WHERE client_id = '$account' and time='$time'";
		echo "$sql";
		mysqli_query($conn, $sql);
		
	 $sql2 ="SELECT amount_current FROM tickets WHERE ticket_id='$row1[1]'";
	 $result2=mysqli_query($conn, $sql2);
	 $row2 = mysqli_fetch_array ($result2);
	 // echo "/*/*"."$row2[0]";
	 
	 $diff=$diff+$row2[0];
	 echo "/*/*".$diff;
	 $sql3 ="UPDATE tickets SET amount_current= '$diff' WHERE tickets.ticket_id = '$row1[1]'";
	 $result3=mysqli_query($conn, $sql3);
	    //header("Location:successlogin.php" );
		mysqli_close($conn);
?>