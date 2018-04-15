<!DOCTYPE html>
<html>
<head>
<mate charset="UTF-8">
<title>スタッフ追加</title>
<link rel="stylesheet" type="text/css" href="staff_add.php">
<style type="text/css">

.add {
	background: aliceblue;
	box-shadow: 0 0 4px rgba(0, 0, 0, 0.23);
	font-size: 50px;
	text-align: center;
	border-bottom: solid 3px #627295;
}

input[type="submit"] {
	width: 50px;
	display: inline-block;
    padding: 0.5em 1em;
    text-decoration: none;
    background: #668ad8;
    color: #FFF;
    border-bottom: solid 4px #627295;
    border-radius: 3px;
}

input[type="button"] {
	width: 50px;
	display: inline-block;
    padding: 0.5em 1em;
    text-decoration: none;
    background: #668ad8;
    color: #FFF;
    border-bottom: solid 4px #627295;
    border-radius: 3px;
}




.text1 {
	font-size: 30px;
	border-left: solid 5px #7db4e6;
	border-radius: 100px;
	margin-top: 30px;
}

</style>

</head>
<body>
	<div class="add">スタッフ追加<br></div>
	<form method="post" action="staff_add_check.php">
		<div class="text1">スタッフ名を入力して下さい。<br></div>
		<input type="text" name="name" style="width: 250px"><br>
		<div class="text1">パスワードを入力して下さい。<br></div>
		<input type="password" name="pass" style="width: 250px"><br>
		<div class="text1">パスワードをもう一度入力して下さい。<br></div>
		<input type="password" name="pass2" style="width: 250px"><br>
		<br>
		<input type="button" onclick="history.back()" value="戻る">
		<input type="submit" value="OK">
	</form>

</body>
</html>