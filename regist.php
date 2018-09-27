<?php
	$link = mysqli_connect("localhost:3306","root","root","bishe");

	$tel = isset($_POST['tel'])?htmlspecialchars($_POST['tel']):"";
	$pwd = isset($_POST['pwd'])?htmlspecialchars($_POST['pwd']):"";

	if ($tel != "" && $pwd != "") {
		$sql_reg_inert = "insert into account (tel, pwd, level, nicheng, number, balance, jifen, address, zip) values ('{$tel}','{$pwd}','1','user_{$tel}','{$tel}','0','0','china','100000')";
		if ( $link -> query($sql_reg_inert)) {
			echo "注册成功";
			setcookie("tel",$tel,time()+3600);
			return true;
		} else {
			echo "注册失败";
			return false;
		}
	} else {
		echo "账号密码不存在";
	}
?>
