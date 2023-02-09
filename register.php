<?php
	include_once("conn_db.php");
	session_start();
?>
<html>
<head>
    <meta charset=utf-8" >
    <title>圖書館系统注册</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container-fluid p-4 bg-primary text-white text-center">
    <form action="" method="post">
        <h2>圖書館系统用戶注册</h2></div>
		<div class="bg-image"
			style="background-image: url('https://media.istockphoto.com/photos/old-books-on-blue-background-picture-id1175314487?k=20&m=1175314487&s=612x612&w=0&h=As95gojI3hsPounRfddV42wH2WRvCrTjuDKZx8S0zQg=');height: 100%;background-size: cover; background-repeat:no-repeat; ">
		<br><div align= 'center'>
        用戶信箱：<input type="text" name="mail" placeholder="請輸入用戶信箱"><br><br>
        用戶姓名：<input type="text" name="name" placeholder="請輸入用戶姓名"><br><br>
        設置密碼：<input type="password" name="password" placeholder="請輸入密碼"><br><br>
        <button type="submit" name="ok1">提交</button>
        <button type="submit" name="ok2">重置</button><br>
		</div>
		<a href="index.html" style="float: right;margin-right: 20px; color: #ffffff;text-decoration:none;">返回登入頁面</a>
        <?php
        if(isset($_POST['ok1'])){
            $mail = $_POST['mail'];
            $arr = array();
			$name = $_POST['name'];
            $pwd = $_POST['password'];
            //$time = date('Y-m-d h:i:s', time());
            $sql = "Select * from user";
            $result= $connect->query($sql);
            foreach ($result as $row){
                array_push($arr,$row['mail']);
            }
            if(in_array($mail,$arr)){
                echo "<h4 style='color: #d43f3a'>帳號已存在，請重新輸入帳號！</h4>";
            }else{
                $sql2 = "Insert into user(mail,pwd,name)values(?,?,?)";
                $result2 = $connect->prepare($sql2);
                $result2->bind_param('sss',$mail,$pwd,$name);
                $result2->execute();
                if($result2){
                    $_SESSION['mail'] = $mail;
                    header('Location:index.html');
                }else{
                    echo "<h4 style='color: #d43f3a'>帳號資訊有誤，請重新輸入帳號！</h4>";
                }
            }
        }
        ?>
		</div>
    </form>
    

</body>
</html>