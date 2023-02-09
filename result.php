<?php
	include_once('head.php');
	include_once("conn_db.php");
	$bname = $_POST["bookname"];
	$sql = "Select * from book_info where name like '%$bname%'";
	$result= $connect->query($sql);
	
	$arr = array();
	$arr2 = array();
	$sql2 = "select b.book_id,b.back_date 
			 from book_info a,borrow_list b
			 where a.id = b.book_id AND a.name like '%$bname%'";
	$result2= $connect->query($sql2);
	foreach ($result2 as $row){
    if(strtotime($row['back_date'])>time()){//借出中
        array_push($arr,$row['book_id']);
    }else{                                  //逾期
        array_push($arr2,$row['book_id']);
    }
}
?>
<html>
	<head>
		<meta charset=utf-8" >
		<title>查詢結果</title>
	</head>
	<body>
	<div class="container" align= 'center'>
	<div class="row" style="margin-top:20px;">
		
		
		<h2>查詢結果</h2>
		<table class='table caption-top table-bordered border-dark' align= 'center'>
			<tr >
				<th class='table-primary table-bordered border-dark' scope='col'>書號</th>
				<th class='table-bordered border-dark' scope='col'>書名</th>
				<th class='table-primary table-bordered border-dark' scope='col'>作者</th>
				<th class='table-bordered border-dark' scope='col'>狀態</th>
				<th class='table-primary table-bordered border-dark' scope='col'>操作</th>
				
			</tr>
		<tbody>
			<?php
				foreach($result as $row)
				{
						echo "<tr line-height: 40px'>";
						echo "<td class='table-primary table-bordered border-dark'>".$row['id']."</td>";
						echo "<td class='table-bordered border-dark'>".$row['name']."</td>";
						echo "<td class='table-primary table-bordered border-dark'>".$row['author']."</td>";
						if(in_array($row['id'],$arr)){
							echo "<td class='table-bordered border-dark'>"."<h6 style='color: #f0770c'>借出</h6>"."</td>";
						}else if (in_array($row['id'],$arr2)){
							echo "<td class='table-bordered border-dark'>"."<h6 style='color: #d43f55'>逾期</h6>"."</td>";
						} else{
							echo "<td class='table-bordered border-dark'>"."<h6 style='color: green'>在館</h6>"."</td>";
						}
						$id = $row['id'];
						echo "<td class='table-primary table-bordered border-dark'>"."<a href='bookinfo.php?book_id=$id'  style= text-decoration:none;>詳情</a>"."</td>";
						echo "</tr>";
				}
			?>
			
		</tbody>
		</table>
		</div>
		</div>
		<a style="float: right;margin-right: 20px;text-decoration:none;" href="search.php" > 返回查詢頁面</a>
	</body>
</html>
