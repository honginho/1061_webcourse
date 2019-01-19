<?php
    session_start(); 
	include 'db_conn.php'; // 匯入連線檔案
	session_destroy();//清除所有session
	// header('Location: login.html');
	header('Location: ../index.html');
?>