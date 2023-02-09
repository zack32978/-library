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
    $sql = "select * from book_info";
    $result= $connect->query($sql);
    echo "<table class='table caption-top table-bordered border-dark' align= 'center'>";
    echo "<caption><h2 >圖書管理頁面 <a href='addbook.php' style='float: right;margin-right: 20px; color: #0000ff;text-decoration:none; '>新增</a></h2></caption>";
	
    echo "<tr style='line-height: 40px;'>
			<th class='table-primary table-bordered border-dark'>書號</th>
			<th class='table-bordered border-dark'>書名</th>
			<th class='table-primary table-bordered border-dark'>入館時間</th>
			<th class='table-bordered border-dark'>操作</th></tr>";
    foreach ($result as $row){
       
		echo "<tr'>";
		echo "<td class='table-primary table-bordered border-dark'>".$row['id']."</td>";
		echo "<td class='table-bordered border-dark'>".$row['name']."</td>";
		echo "<td class='table-primary table-bordered border-dark'>".$row['AddDate']."</td>";
		$id = $row['id'];
		
		echo "<td class='table-bordered border-dark'>"."<a href='bookinfo.php?book_id=$id' style= text-decoration:none;>詳情</a>"."&nbsp&nbsp&nbsp<a href='alterbook.php?book_id=$id' style= text-decoration:none;>修改</a>"."&nbsp&nbsp&nbsp<a href='deletebook.php?book_id=$id' style= text-decoration:none;>删除</a>"."</td>";
		echo "</tr>";
        
    }
	
    echo "</table>";
}
echo "</div>";
?>