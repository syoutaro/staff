<!DOCTYPE html>
<html>
<head>
<mate charset="UTF-8">
<title>情報追加完了</title>
</head>
<link rel="stylesheet" type="text/css" href="staff_add_done.php">
<style type="text/css">

.text1 {
	font-size: 30px;
	border-left: solid 5px #7db4e6;
	border-radius: 100px;
	margin-top: 30px;
}

</style>
<body>

<?php

	try {
		$staff_name = $_POST['name'];
		$staff_pass = $_POST['pass'];


		$staff_name = htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
		$staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');

		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user ='root';
		$password ='root';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$sql = 'INSERT INTO mst_staff(name,password) VALUES (?,?)';
		$stmt = $dbh->prepare($sql);
		$data[] = $staff_name;
		$data[] = $staff_pass;
		$stmt->execute($data);

		$dbh = null;

		print $staff_name;
		print '<div class="text1">さんを追加しました。<br></div>';
	}

	catch(Exception $e) {

		print '<div class="text1">ただいま障害により大変ご迷惑をおかけしております。</div>';
		exit();
	}

?>

<a href="staff_list.php">戻る</a>

</body>
</html>