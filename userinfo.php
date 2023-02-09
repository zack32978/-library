<?php
include_once('head.php');
include_once("conn_db.php");
$id = $_GET['user_id'];
?>

<?php

$sql = "SELECT book_id,name,borrow_date,back_date 
            FROM borrow_list a,book_info b
            WHERE a.book_id = b.id AND a.user_id='$id'" ;
$result= $connect->query($sql);
echo "<div class='container' style='text-align: center'>";
echo "<table class='table caption-top table-bordered border-dark' align= 'center'>";
echo "<caption><h2>用戶借閱資訊</h2></caption>";
echo "<tr style='line-height: 40px;'>
<th class='table-primary table-bordered border-dark'>書號</th>
<th>書名</th>
<th class='table-primary table-bordered border-dark'>借書時間</th>
<th>應還時間</th>
<th class='table-primary table-bordered border-dark'>詳情</th></tr>";
$time = time();
$borrow_data = date("Y-m-d",$time);
$a = strtotime($borrow_data);
foreach ($result as $row){
        echo "<tr line-height: 40px'>";
        echo "<td class='table-primary table-bordered border-dark'>".$row['book_id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td class='table-primary table-bordered border-dark'>".$row['borrow_date']."</td>";
        echo "<td>".$row['back_date']."</td>";
        $b = strtotime($row['back_date']);
        if($a<=$b){
            echo "<td class='table-primary table-bordered border-dark'><span style='color: #5cb85c'>正常</span></td>";
        }else{
            echo "<td class='table-primary table-bordered border-dark'><a href='borrowmanager.php' style='color: #d43f3a;text-decoration: none;'>逾期</a></td>";
        }
        echo "</tr>";
}
echo "</table>";
echo "</div>";
?>