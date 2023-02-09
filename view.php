<?php
include_once('head.php');
include_once("conn_db.php");
$sql = "select * from book_info";
$result= $connect->query($sql);

$arr = array();
$arr2 = array();
$sql2 = "select book_id,back_date from borrow_list";
$result2= $connect->query($sql2);

foreach ($result2 as $row){
    if(strtotime($row['back_date'])>time()){//借出中
        array_push($arr,$row['book_id']);
    }else{                                  //逾期
        array_push($arr2,$row['book_id']);
    }
}
echo "</table>";
?>
<div class="container" align= 'center'>
    <ul>
        <?php
            $count = 0;
			echo "<table class='table caption-top table-bordered border-dark'  align= 'center'>";
			echo "<br>";
			echo "<caption><h2 style='text-align: center'>圖書列表</h2></caption>";
			echo "<tr style='line-height: 40px;'>
			<th class='table-primary table-bordered border-dark' scope='col' >書號</th>
			<th class='table-bordered border-dark' scope='col'>書名</th>
			<th class='table-primary table-bordered border-dark' scope='col'>作者</th>
			<th class='table-bordered border-dark' scope='col'>狀態</th>
			<th class='table-primary table-bordered border-dark' scope='col'>詳情</th>
			</tr>";
            
            foreach ($result as $row){
                echo "<tr>";
				echo "<td class='table-primary table-bordered border-dark'>".$row['id']."</td>";
				echo "<td class='table-bordered border-dark'>".$row['name']."</td>";
				echo "<td class='table-primary table-bordered border-dark'>".$row['author']."</td>";
				
                
                if(in_array($row['id'],$arr)){
                    echo "<td class='table-bordered border-dark'>"."<h6 style='color: #f0770c'>借出</h6>"."</td>";
                }else if (in_array($row['id'],$arr2)){
                    echo "<td class='table-bordered border-dark'>"."<h6 style='color: #d43f3a'>逾期</h6>"."</td>";
                } else{
                    echo "<td class='table-bordered border-dark'>"."<h6 style='color: greenyellow'>在館</h6>"."</td>";
                }
                $id = $row['id'];
                echo "<td class='table-primary table-bordered border-dark'>"."<a href='bookinfo.php?book_id=$id'  style= text-decoration:none;>詳情</a>"."</td>";
                echo "</tr>";
                if($count>12){
                    $count=0;
                }else{
                    $count++;
                }
            }

        ?>
    </ul>

</div>

