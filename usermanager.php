<?php
include_once('head.php');
include_once("conn_db.php");
$user_mail = $_SESSION['user_mail'];
$flag = 0;
if($user_mail == "root"){$flag = 1;}
echo "<div class='container' style='text-align: center'>";
if($flag==0){
    echo "<h1 style='margin: 200px auto;text-align: center;'>你不具有此權限！</h1>";
}else{
    $sql = "select * from user";
    $result= $connect->query($sql);
    echo "<table class='table caption-top table-bordered border-dark' align= 'center'>";
    echo "<br><caption><h2>用戶管理頁面</h2></caption>";
    echo "<tr style='line-height: 40px;'>
			<th class='table-primary table-bordered border-dark'>用戶ID</th>
			<th class='table-bordered border-dark'>姓名</th>
			<th class='table-primary table-bordered border-dark'>信箱</th>
			<th class='table-bordered border-dark'>操作</th>
			</tr>";
    foreach ($result as $row){
       
		echo "<tr line-height: 40px'>";
		echo "<td class='table-primary table-bordered border-dark'>".$row['id']."</td>";
		echo "<td class='table-bordered border-dark'>".$row['name']."</td>";
		echo "<td class='table-primary table-bordered border-dark'>".$row['mail']."</td>";
		$id = $row['id'];
		echo "<td class='table-bordered border-dark'>"."<a href='userinfo.php?user_id=$id' style= text-decoration:none;>詳情</a>"."&nbsp&nbsp&nbsp<a href='deleteUser.php?user_id=$id' style= text-decoration:none;>删除</a>"."</td>";
		echo "</tr>";
        
    }
    echo "</table>";
}
echo "</div>";
?>