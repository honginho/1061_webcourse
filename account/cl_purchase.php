<?php
	include ('db_conn.php'); // 匯入連線檔案
	session_start();
	/**/
	// header("Content-type: text/html; charset=utf8"); //頁面編碼
	// header("Content-Type:application/msword");   //將此html頁面轉成word
	// header("Content-Disposition:attachment;filename=".mb_convert_encoding("purchase","gbk","utf8").".doc");   //設定word檔名
	// header("Pragma:no-cache");
	// header("Expires:0");
	/**/
	//$conn=mysqli_connect($servername,$username,$password,$dbname);
    //if(!$conn){die("Connection Failed:".mysqli_connect_error());}
    //得到現在時間當作購買時間
    date_default_timezone_set('Asia/Taipei');
	$datetime =date('Y-m-d H:i:s');
    
    $client_id=$_SESSION['account'];
    $get_cl_cart="SELECT * FROM `cart` WHERE `client_id`='$client_id'";
    $cl_cart=mysqli_query($conn,$get_cl_cart);
    $counter=0;
    $rownum = mysqli_num_rows($cl_cart);
	if($cl_cart){
        while($row = mysqli_fetch_array ($cl_cart)){
            // //ticket_id
            // $row[0];
            // //amount
            // $row[2];
            // //purchase time
            // $datetime;
            if($counter<$rownum){
                $sql="INSERT INTO purchase (ticket_id,client_id,amount,time,start,end) VALUES ('$row[0]','$client_id','$row[2]','$datetime','$row[4]','$row[5]')";
                $insertintopurchase=mysqli_query($conn,$sql);
                //如果加入purchase成功就刪掉cart裡面的紀錄
                if($insertintopurchase){
                    $del_cart="DELETE FROM cart WHERE ticket_id = '$row[0]' and  client_id = '$client_id' and time ='$row[3]'";
                    mysqli_query($conn,$del_cart);  
                    
                }else{
                    echo "Error:".$sql."<br>".$conn->error;
                }

            }else{
                echo "刪除成功";
                //header("Location:successpurchase.php" );
            }
            $counter++;
        }
    }else{
        echo "Error:".$get_cl_cart."<br>".$conn->error;
    }	
    mysqli_close($conn);
    //echo '購買成功';
    header("Location:showcart.php" );
?>