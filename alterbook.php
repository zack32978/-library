<?php
include_once("conn_db.php");
include_once('head.php');
$id = $_GET['book_id'];
$sql = "select * from book_info where id='$id'";
$result = $connect->query($sql);
foreach($result as $row){
    $Name =$row['name'];
    $Author =$row['author'];
	$Press =$row['press'];
	$PressTime =$row['press_time'];
	$ISBN =$row['ISBN'];
}
echo "<div class='col-sm-3'></div><br>";
echo "<h4 align= 'center'>書號：$id 修改資料</h4><br>";
echo "<div align= 'center'>";
echo "<form action='' method='post'>";
echo "<div class='col-sm-3' align= 'left'>書名：<input type='text' name='name' value=$Name><br><br></div>";
echo "<div class='col-sm-3' align= 'left'>作者：<input type='text' name='author' value=$Author><br><br></div>";
echo "<div class='col-sm-3' align= 'left'>出版社：<input type='text' name='press' value=$Press><br><br></div>";
echo "<div class='col-sm-3' align= 'left'>出版時間：<input type='date' name='press_time' value=$PressTime><br><br></div>";
echo "<div class='col-sm-3' align= 'left'>ISBN：<input type='text' name='ISBN' value=$ISBN><br><br></div>";
echo "<button type='submit' name='ok'>提交</button>";
echo "</form></div>";
if(isset($_POST['ok'])){
    $newName = $_POST['name'];
    $newAuthor = $_POST['author'];
	$newPress = $_POST['press'];
	$newPressTime = $_POST['press_time'];
	$newISBN = $_POST['ISBN'];
    $sql2 = "update book_info
             set name = ?,author=?,press=?,press_time=?,ISBN=?
             where id= ?";
    $result2 = $connect->prepare($sql2);
	$result2->bind_param('ssssss',$newName,$newAuthor,$newPress,$newPressTime,$newISBN,$id);
	$result2->execute();
	if($result2){echo "<h2 style='text-align: center;margin-top: 150px;'>修改成功</h2>";}
}
?>
