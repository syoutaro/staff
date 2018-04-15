<!DOCTYPE html>
<html>
<head>
<mate charset="UTF-8">
<title>スタッフ修正チェック</title>
<link rel="stylesheet" type="text/css" href="staff_edit_check.php">
<style type="text/css">

.text1 {
	font-size: 30px;
	border-left: solid 5px #7db4e6;
	border-radius: 100px;
	margin-top: 30px;
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

	$staff_code=$_POST['code'];
	$staff_name=$_POST['name'];
	$staff_pass=$_POST['pass'];
	$staff_pass2=$_POST['pass2'];

	$staff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
	$staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');
	$staff_pass2=htmlspecialchars($staff_pass2,ENT_QUOTES,'UTF-8');

	if($staff_name=='') {

		print'<div class="text1">スタッフ名が入力されてません。<br></div>';

	} else {

		print'スタッフ名:';
		print$staff_name;
		print'<br>';

	}

	if($staff_pass=='') {

		print'<div class="text1">パスワードが入力されてません。</div><br>';
	}

	if($staff_pass!==$staff_pass2){

		print'<div class="text1">パスワードが一致しません。<br></div>';
	}

	if($staff_name==''||$staff_pass=''||$staff_pass!==$staff_pass2){

		print'<form>';
		print'<input type="button" onclick="history.back()" value="戻る">';
		print'</form>';
	} else {

		$staff_pass=md5($staff_pass);
		print'<form method="post" action="staff_edit_done.php">';
		print'<input type="hidden" name="code" value="'.$staff_code.'">';
		print'<input type="hidden" name="name" value="'.$staff_name.'">';
		print'<input type="hidden" name="pass" value="'.$staff_pass.'">';
		print'<br>';
		print'<input type="button" onclick="history.back()" value="戻る">';
		print'<input type="submit" value="OK">';
		print'</form>';
	}

?>

</body>
</html>