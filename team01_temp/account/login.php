<?php
    session_start();
	include ('db_conn.php'); // 匯入連線檔案
	$account = $_POST['account'];
	$password=$_POST["password"];
	
	$sql="SELECT * from all_account where account='$account' and password=MD5('$password')";
    $result = mysqli_query($conn,$sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "帳號:". $row["account"]." <br>密碼:".$row["password"];
			if($row["identifier"]==1){
				echo "<br>身分:client";
			}
			else{
				echo "<br>身分:administrator";
			}
            $_SESSION['account']=$row["account"];
			$_SESSION['password']= $row["password"];
			$_SESSION['identifier']= $row["identifier"];				
		}
		if($_SESSION['identifier']==1){
			 header('Location: tickets.php');	
		}
	    else{
           header('Location: successlogin.php');			
		}
	}
	else{
		echo "帳密錯誤!!";
		header("Refresh:1;url=../index.html" );
	}
	mysqli_close($conn);
?>