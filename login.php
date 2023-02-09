<?php
	session_start();
	include_once("conn_db.php");
	$user = $_POST["user"];
	$pwd = $_POST["pwd"];
	$database = 'db';
	$sql ="select * from user where mail = '$user' and pwd ='$pwd'";
	$result = $connect->query($sql);
	if($result->num_rows ==0 && $user != 'root')
	{
		echo "帳號或密碼輸入錯誤，請重新輸入！";
	}
	else
	{
		$_SESSION['user_mail'] = $user;  
		header('Location:http://localhost/admin.php');
	}
	
?>
