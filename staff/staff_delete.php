<!DOCTYPE html>
<html>
<head>
<mate charset="UTF-8">
<title>削除確認画面</title>
<link rel="stylesheet" type="text/css" href="staff_delete.php">
<style type="text/css">

.text1 {
	font-size: 30px;
	border-left: solid 5px #7db4e6;
	border-radius: 100px;
	margin-top: 30px;
}

.delete {
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

</style>
</head>
<body>

<?php

	try {
		$staff_code=$_GET['staffcode'];

		$dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
		$user ='root';
		$password ='root';
		$dbh = new PDO($dsn, $user, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$sql = 'SELECT name FROM mst_staff WHERE code=?';
		$stmt = $dbh->prepare($sql);
		$data[] = $staff_code;
		$stmt->execute($data);

		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		$staff_name=$rec['name'];

		$dbh = null;

	} catch(Exception $e) {
		print'<div class="text1">ただいま障害により大変ご迷惑をおかけしております。</div>';
		exit();
	}

?>

<div class="delets">スタッフ削除<br></div>
<br>
<div class="text1">スタッフコード<br></div>
<?php print $staff_code;?>
<br>
<div class="text1">スタッフ名</div>
<?php print $staff_name;?>
<br>
<div class="text1">このスタッフを削除してよろしいですか？<br></div>
<br>

<form method="post" action="staff_delete_done.php">
	<input type="hidden" name="code" value="<?php print $staff_code?>"><br>
	<input type="button" onclick="history.back()" value="戻る">
	<input type="submit" name="OK">
</form>



</body>
</html>