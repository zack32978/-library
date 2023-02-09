<?php
include_once("conn_db.php");
include_once('head.php');
$id = $_GET['book_id'];
$sql = "select * from book_info where id='$id'";
$result= $connect->query($sql);
$sql2 = "select * from borrow_list where book_id = '$id'";
$result2 = $connect->query($sql2);
?>

<div class="col-sm-3" ><br></div>

    <h2 align= 'center'>圖書詳情</h2>
    <?php
		echo "<div align= 'center' ><br>"; 
        foreach ($result as $row){
				echo "<div class='col-sm-3' align= 'left'><h5>書名：".$row['name']."</h5></div>";
				echo "<div class='col-sm-3' align= 'left'><h5>作者：".$row['author']."</h5></div>";
				echo "<div class='col-sm-3' align= 'left'><h5>出版社：".$row['press']."</h5></div>";
				echo "<div class='col-sm-3' align= 'left'><h5>出版時間：".$row['press_time']."</h5></div>";
				echo "<div class='col-sm-3' align= 'left'><h5>ISBN：".$row['ISBN']."</h5></div>";
				echo "<div class='col-sm-3' align= 'left'><h5>入館時間：".$row['AddDate']."</h5></div></br>";
            
        }
		echo "</div>";
        if($result2->num_rows!=0){
            foreach ($result2 as $row)
			echo "<div align= 'center'>";
			echo "<div class='col-sm-3' align= 'left'>";
            echo "<table class='table table-bordered border-dark' align= 'center'>";
            echo "<tr>";
            echo "<th class='table-primary table-bordered border-dark'>借出人ID</th>";
            echo "<th class='table-primary table-bordered border-dark'>應還日期</th>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>{$row['user_id']}</td>";
            echo "<td>{$row['back_date']}</td>";
            echo "</tr>";
            echo "</table>";
			echo "</div>";
			echo "</div>";
        }
    ?>
</div>
