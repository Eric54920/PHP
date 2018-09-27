<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<div class="home">
		<div class="container">
			<div class="home-con">
				<div class="home-logo">LOGO</div>
				<div class="home-cate">
					<span class="home-cate-bg"></span>
					<li class="regist">
						<a href="javascript:;" class="active-a">注 册</a>
						<div class="regist-con active-home">
							<form class="regist-wrap" action="check.php" method="post">
								<div class="regist-one">
									<label for="telnum"><span class="fa fa-phone"></span> 手机号</label>
									<input type="tel" name="telnum" class="inp">
									<input type="button" value="获取验证码" class="yzm">
									<input type="button" value="下一步" class="next">
								</div>
								<div class="regist-two">
									<label for="code">验证码</label>
									<input type="text" name="code" class="inp">
									<input type="button" value="下一步" class="next">
								</div>
								<div class="regist-three">
									<label for="pwd"><span class="fa fa-lock"></span> 密码</label>
									<input type="password" class="inp" name="pwd" autocomplete="off">
									<input type="button" value="下一步" class="next">
								</div>
								<div class="regist-four">
									<label for="pwd"><span class="fa fa-angellist"></span> 最后一步，确认密码</label>
									<input type="password" class="inp" name="repwd" autocomplete="off">
									<input type="button" value="注 册" class="regist-btn">
								</div>
							</form>
							<div class="regist-process">
								<span></span>
							</div>
						</div>
					</li>
					<li class="login">
						<a href="javascript:;">登 录</a>
						<div class="login-con">
							<form class="login-wrap" action="ajax.php" method="post">
								<input type="tel" class="inp" name="tel" placeholder="手机号">
								<input type="password" class="inp" name="pwd" placeholder="密码" autocomplete="off">
								<input type="button" value="登 录">
							</form>
						</div>
					</li>
				</div>
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
</body>
</html>
