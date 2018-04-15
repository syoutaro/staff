<!DOCTYPE html>
<html>
<head>
<mate charset="UTF-8">
<title>スタッフ削除実行</title>
<link rel="stylesheet" type="text/css" href="staff_delete_done.php">
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


		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user ='root';
		$password ='root';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$sql = 'DELETE FROM mst_staff WHERE code=?';
		$stmt = $dbh->prepare($sql);

		$date[] = $staff_code;
		$stmt->execute($date);

		$dbh = null;


	}

	catch(Exception $e) {

		print '<div class="text1">ただいま障害により大変ご迷惑をおかけしております。</div>';
		exit();
	}

?>

<div class="text1">削除しました。<br></div>
<br>
<a href="staff_list.php">戻る</a>

</body>
</html>