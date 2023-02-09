<?php
	include_once('head.php');
	include_once("conn_db.php");
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>圖書查詢介面</title>
	</head>
	<body>
	<div class="container" style="height: 320px;">
		<form action = "result.php" method="POST">
		<div class="row" style="margin-top:20px;">
		<div class="row" style="text-align:center;">
		<h2>圖書查詢</h2><br><br>
		<h3><input type = "text" name = "bookname" placeholder="請輸入書名"></h3><br><br>
		<h3><input type = "submit" name "search" value = "查詢"></h3><br><br>
			
		</div>
		</div>
		</form>
	</div>	
	</body>
</html>