<?php
	include ('db_conn.php'); // 匯入連線檔案
	//$conn=mysqli_connect($servername,$username,$password,$dbname);
	//if(!$conn){die("Connection Failed:".mysqli_connect_error());}

	$account = $_POST['account'];
	$password=$_POST["password"];
    $identifier=$_POST["identifier"];
	
	if($identifier=="client"){
		$identifier=1;
	}
	else{
		$identifier=2;
	}
	$sql="INSERT INTO all_account (account,password,identifier) VALUES ('$account',MD5('$password'),'$identifier')";

	if(mysqli_query($conn,$sql)){
		header("Location:../index.html" );
	}
	else{
		echo "Error:".$sql."<br>".$conn->error;
	}
	mysqli_close($conn);
?>