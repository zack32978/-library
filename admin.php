<?php
include_once('head.php');
include_once("conn_db.php");
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>圖書館管理系統</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	
</head>
<body>

<div class="container" align= 'center'>
	<br>
	<table class='table caption-top table-bordered border-dark' >
    <caption><h2>個人資料</h2></caption>
	<tr class="table-bordered border-dark" style='line-height: 40px;'>
		<th  class='table-primary table-bordered border-dark' scope='col' >用戶ID</th>
		<th class='table-primary table-bordered border-dark' scope='col'> 用戶信箱</th>
		<th class='table-primary table-bordered border-dark' scope='col'> 用戶姓名 </th>
	</tr>
    <?php
        $user_mail = $_SESSION['user_mail'];
        $sql = "select * from user where mail ='$user_mail'";
        $result= $connect ->query($sql);
        foreach ($result as $row){
            echo "<td ><h5>{$row['id']}</h5></td>";
			echo "<td ><h5>{$row['mail']}</h5></td>";
			echo "<td ><h5>{$row['name']}</h5></td>";
        }
        
    ?>
	
    <?php
	if($user_mail != 'root')
	{
		$sql = "SELECT book_id,b.name,borrow_date,back_date 
				FROM borrow_list a,book_info b,user c 
				WHERE a.book_id = b.id AND a.user_id= c.id AND c.mail = '$user_mail'";
		$result= $connect->query($sql);
		
		echo "<table class='table caption-top table-bordered border-dark' align= 'center'>";
		echo "<br>";
		echo "<caption><h2>個人借閱資訊</h2></caption>";
		echo "<tr style='line-height: 40px;'>
		<th class='table-primary table-bordered border-dark' scope='col' >書號</th>
		<th class='table-bordered border-dark' scope='col'>書名</th>
		<th class='table-primary table-bordered border-dark' scope='col'>借書時間</th>
		<th class='table-bordered border-dark' scope='col'>應還時間</th>
		<th class='table-primary table-bordered border-dark' scope='col'>詳情</tr>
		</tr>";
		$time = time();
		$borrow_data = date("Y-m-d",$time);
		$a = strtotime($borrow_data);
		foreach ($result as $row){
			echo "<tr >";
			echo "<td class='table-primary table-bordered border-dark'>".$row['book_id']."</td>";
			echo "<td class='table-bordered border-dark'>".$row['name']."</td>";
			echo "<td class='table-primary table-bordered border-dark'>".$row['borrow_date']."</td>";
			echo "<td class='table-bordered border-dark'>".$row['back_date']."</td>";
			$b = strtotime($row['back_date']);
			if($a<=$b){
				echo "<td class='table-primary table-bordered border-dark'><span style='color: #5cb85c'>正常</span></td>";
			}else{
				echo "<td class='table-primary table-bordered border-dark'><a href='borrowmanager.php' style='color: #d43f3a;text-decoration: none;'>逾期</a></td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	else{
		echo "<tr>";
		echo "<td class='table-bordered border-dark'><h5>root</h5></td>";
		echo "<td class='table-bordered border-dark'><h5>m103040032@g-mail.nsysu.edu.tw</h5></td>";
		echo "<td class='table-bordered border-dark'><h5>管理員</h5></td>";
		echo "</tr>";
        }
    echo "</table>";
    ?>
</div>
</div>
</body>
</html>