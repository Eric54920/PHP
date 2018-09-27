<?php
	$link = mysqli_connect("localhost:3306","root","root","bishe");

	$num = isset($_POST['num'])?htmlspecialchars($_POST['num']):"";

	// 注册校验
	if ($num != "") {
		$sql_regist = "select * from account where tel={$num}";
		$result = $link -> query($sql_regist);
		$row = $result -> fetch_row();
		if ($row>0) {
			echo "false";
			return false;
		} else {
			echo "true";
			return true;
		}
	} else {
		return false;
	}

?>
