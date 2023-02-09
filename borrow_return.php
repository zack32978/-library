<?php
include_once("conn_db.php");
include_once('head.php');
include("sendmail.php");
if(isset($_POST['ok'])){
    $num = $_POST['operation'];
    $bookid = $_POST['bookid'];
	$user_mail = $_SESSION['user_mail'];
	//user mail in borrow list
	$arr = array();
	$sql = "select b.id, a.book_id 
			from borrow_list a,user b 
			where a.user_id = b.id AND b.mail = '$user_mail' ";
	$result = $connect->query($sql);
	foreach($result as $row)
	{
		array_push($arr,$row['book_id']);
		$userid = $row['id'];
	}
	//book id in borrow list
	$arr2 = array();
	$sql2 = "select b.id, a.book_id 
			from borrow_list a,book_info b 
			where a.book_id = b.id AND b.id = '$bookid' ";
	$result2 = $connect->query($sql2);
	foreach($result2 as $row)
	{
		array_push($arr2,$row['book_id']);
	}
    if($num==0){//借書
        $time = time();
        $borrow_data = date("Y-m-d",$time);
        $back_data = date("Y-m-d",strtotime("+2 month"));
		
		if(in_array($bookid,$arr))
		{
			echo "<h2 style='text-align: center; margin-top: 150px;'>你已借出此書！</h2>";	
		}
		else if(in_array($bookid,$arr2))
		{
			echo "<h2 style='text-align: center; margin-top: 150px;'>此書已被借出！</h2>";
			$inquiry_bookname = "SELECT name FROM book_info WHERE id = '".$bookid."'";
			$inquiry_result = mysqli_query($connect,$inquiry_bookname);
			$bookname = mysqli_fetch_array($inquiry_result);
			
			$inquiry_borrowname = "SELECT name FROM user a, borrow_list b WHERE b.book_id = '".$bookid."' AND a.id = b.user_id ";
			$inquiry_result = mysqli_query($connect,$inquiry_borrowname);
			$borrowname = mysqli_fetch_array($inquiry_result);
			sendmail($borrowname[0],$bookname[0]);
		}
		else
		{
			$sql = "insert into borrow_list values('$bookid','$userid','$borrow_data','$back_data')";
			$connect->query($sql);
			header("Location:userinfo.php?user_id=$userid");
		}
    }else{//還書
		if(in_array($bookid,$arr)== 0 )
		{
			echo "<h2 style='text-align: center; margin-top: 150px;'>你未借出此書！</h2>";	
		}
		else
		{
			$sql  = "delete from borrow_list 
					where book_id='$bookid' and user_id='$userid'";
			$connect->query($sql);
			header("Location:userinfo.php?user_id=$userid");
		}
    }
   
}

if (isset($_POST['ok2'])){
    header("Location:borrowmanager.php");
}
?>