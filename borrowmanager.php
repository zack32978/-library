<?php
include_once('head.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>圖書館管理系統</title>
</head>
<body>

<div class="container" style="height: 320px;">
	<br>
    <h2 style='text-align: center'>借閱管理</h2>
	<br>
    <form action="borrow_return.php" method="post" style='text-align: center'>
        <h3><input type="text" name="bookid" placeholder="請輸入書號"></h3><br><br>
        <h3><input type="radio" name="operation" value="0" checked>借書&nbsp&nbsp&nbsp <input type="radio" name="operation" value="1">還書</h3>
        <br><button type="submit" name="ok">確定</button>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <button type="submit" name="ok2">重置</button>

    </form>
</div>
</body>