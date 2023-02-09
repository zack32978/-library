<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>圖書館管理系统</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
 <div class="container">
    <span class="navbar-text"><h1>圖書館管理系统</h1></span>
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="admin.php"><li>主頁</li></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="view.php"><li>圖書列表</li></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="search.php"><li>圖書查詢</li></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="borrowmanager.php"><li>借閱管理</li></a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">&nbsp&nbsp&nbsp管理</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="bookmanager.php">圖書管理</a></li>
					<li><a class="dropdown-item" href="usermanager.php">用戶管理</a></li>
				</ul>
			</li>
			
			<?php
				session_start();
				echo "<span class='navbar-text'>&nbsp&nbsp用戶：".$_SESSION['user_mail']."</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 
			?>
			<li class="nav-item">
				<a class="nav-link" href="index.html">退出</a>
			</li>
		</ul>
	</div>
</nav>
</body>