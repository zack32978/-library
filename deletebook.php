<?php
include_once('head.php');
include_once("conn_db.php");
$id = $_GET['book_id'];
$sql = "Delete from book_info where id='$id'";
$result = $connect->query($sql);
$sql2 = "Delete from borrow_list where book_id='$id'";
$result2 = $connect->query($sql2);
echo "<h2 style='text-align: center; margin-top: 150px;'>删除成功！</h2>";
?>