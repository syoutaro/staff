<!DOCTYPE html>
<html>
<head>
<mate charset="UTF-8">
<title>スタッフ一覧</title>
<link rel="stylesheet" type="text/css" href="staff_list.php">
<style type="text/css">
.list {
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


</style>

</head>
<body>


<?php

try {

	$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
	$user ='root';
	$password ='root';
	$dbh = new PDO($dsn, $user, $password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$sql = 'SELECT code,name FROM mst_staff WHERE 1';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	$dbh = null;

	print'<div class="list">スタッフ一覧<br></div>';

	print'<form method="post" action="staff_branch.php">';

	while(true) {
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		if($rec==false) {
			break;
		}
		print'<input type="radio" name="staffcode" value="'.$rec['code'].'">';
		print$rec['name'];
		print'<br>';
	}

	print'<input type="submit" name="disp" value="参照">';
	print'<input type="submit" name="add" value="追加">';
	print'<input type="submit" name="edit" value="修正">';
	print'<input type="submit" name="delete" value="削除">';
	print'</form>';
}
catch(Exception $e) {
	print'ただいま障害により大変ご迷惑をおかけしております。';
	exit();
}

 ?>

</body>
</html>