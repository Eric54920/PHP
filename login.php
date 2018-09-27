<?php
	$link = mysqli_connect("localhost:3306","root","root","bishe");
	// 登录信息
	$tel = isset($_POST['tel'])?htmlspecialchars($_POST['tel']):"";
	$pwd = isset($_POST['pwd'])?htmlspecialchars($_POST['pwd']):"";

	// 登录校验
	if ($tel !="" && $pwd != "") {
		$sql_login = "select * from account where tel={$tel} and pwd={$pwd} limit 1";
		if ( $result = $link -> query ( $sql_login )){
			$rows = $result -> fetch_array(MYSQLI_NUM);
			setcookie("tel",$rows[0],time()+3600);
			setcookie("level",$rows[2],time()+3600);
			echo "ok,欢迎回来~";
			return true;
		} else {
			echo "手机号或密码不正确！";
			return false;
		}
	} else {
		echo "用户名和密码不存在！";
		return false;
	}
?>
