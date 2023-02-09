<?php
	include_once("conn_db.php");
	include_once("head.php");
	include("sendmail.php");
?>
<html>
<head>
    <meta charset=utf-8" >
    <title>新書注册</title>
</head>
<body>
<div class="col-sm-3" ></div>
    <form action="" method="post">
        <br><h2 align= 'center'>新書注册</h2>
		<div align= 'center' >
        <div class='col-sm-3' align= 'left'>書名：<input type="text" name="name" placeholder="請輸入書名"><br><br></div>
        <div class='col-sm-3' align= 'left'>作者：<input type="text" name="author" placeholder="請輸入作者"><br><br></div>
        <div class='col-sm-3' align= 'left'>出版社：<input type="text" name="press" placeholder="請輸入出版社"><br><br></div>
		<div class='col-sm-3' align= 'left'>出版時間：<input type="date" name="press_time" placeholder="請輸入出版時間"><br><br></div>
		<div class='col-sm-3' align= 'left'>ISBN：<input type="text" name="ISBN" placeholder="請輸入ISBN"><br><br></div>
        <button type="submit" name="ok1">提交</button>
        <button type="submit" name="ok2">重置</button><br>
        <?php
        if(isset($_POST['ok1'])){
         
			$name = $_POST['name'];
			$author = $_POST['author'];
			$press = $_POST['press'];
			$press_time = $_POST['press_time'];
			$ISBN = $_POST['ISBN'];
            $adddate = date('Y-m-d', time());
			$sql = "Insert into book_info(name,author,press,press_time,ISBN,AddDate)values(?,?,?,?,?,?)";
			$result = $connect->prepare($sql);
			$result->bind_param('ssssss',$name,$author,$press,$press_time,$ISBN,$adddate);
			$result->execute();
			
			$inquiry_mail = "SELECT mail FROM user";
			$usermail = $connect->query($inquiry_mail);
			foreach($usermail as $row){
				sendmail_Group($row['mail'],$name);}
			
			
			if($result){
				echo "<h2 style='text-align: center; margin-top: 150px;'>新增成功！</h2>";
				//header('Location:bookmanager.php');
			}else{
				echo "<h4 style='color: #d43f3a'>資訊有誤，請重新輸入！</h4>";
			}
        }
        ?>
    </form>
</div>
</body>
</html>