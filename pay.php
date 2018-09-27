<?php
	$link = mysqli_connect("localhost:3306","root","root","bishe");

	$tel = isset($_COOKIE['tel'])?htmlspecialchars($_COOKIE['tel']):"";
	$level = isset($_COOKIE['level'])?htmlspecialchars($_COOKIE['level']):"";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>支付</title>
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<!-- topbar -->
	<?php include "topbar.php"; ?>
	<!-- banner -->
	<?php include "banner.php"; ?>
	<div class="pay-con">
		<div class="container">
			<table>
				<thead>
					<tr>
						<th>名称</th>
						<th>数量(件)</th>
						<th>单价(￥)</th>
						<th>金额(￥)</th>
					</tr>
				</thead>
				<tbody>
				 <?php
				 	$obj = $_GET['obj'];
					$Obj = json_decode($obj,true);
					for ($i=0;$i<count($Obj);$i++) {
					echo "<tr>
									<td>{$Obj[$i][0]}</td>
									<td>
										<button class='down'>-</button>
										<input type='text' value='1' class='pay-num'>
										<button class='up'>+</button>
									</td>
									<td class='pay-price'>{$Obj[$i][1]}</td>
									<td class='pay-totalPrice'></td>
								</tr>";
						}
					?>
				</tbody>
			</table>
			<p>总额：<span></span> <button>支付</button></p>
		</div>
	</div>
	<?php include "footer.php"; ?>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
</body>
</html>
