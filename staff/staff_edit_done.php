<!DOCTYPE html>
<html>
<head>
<mate charset="UTF-8">
<title>スタッフ修正実行</title>
<link rel="stylesheet" type="text/css" href="staff_edit_done.php">
<style type="text/css">

.text1 {
	font-size: 30px;
	border-left: solid 5px #7db4e6;
	border-radius: 100px;
	margin-top: 30px;
}

</style>
</head>
<body>

<?php

	try {
		$staff_code = $_POST['code'];
		$staff_name = $_POST['name'];
		$staff_pass = $_POST['pass'];

		$staff_name = htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
		$staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user ='root';
		$password ='root';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$sql = 'UPDATE mst_staff SET name=?,password=? WHERE code=?';
		$stmt = $dbh->prepare($sql);
		$data[] = $staff_name;
		$data[] = $staff_pass;
		$data[] = $staff_code;
		$stmt->execute($data);

		$dbh = null;


	}

	catch(Exception $e) {

		print '<div class="text1">ただいま障害により大変ご迷惑をおかけしております。</div>';
		exit();
	}

?>

<div class="text1">修正しました。<br></div>
<br>
<a href="staff_list.php">戻る</a>

</body>
</html>