<?php
	$tel = isset($_COOKIE['tel'])?htmlspecialchars($_COOKIE['tel']):"";
	$level = isset($_COOKIE['level'])?htmlspecialchars($_COOKIE['level']):"";

	$bookname = isset($_GET['name'])?htmlspecialchars($_GET['name']):"";

	$link = mysqli_connect("localhost:3306","root","root","bishe");

	$sql_bookname = "select * from bookstore where bookname='{$bookname}'";
	if ($result_bookname = $link -> query($sql_bookname)) {
		$rows = $result_bookname -> fetch_array(MYSQLI_NUM);
	}
	$sql_cate = "select * from bookstore where category='{$rows[7]}'";
	if ($result_cate = $link -> query($sql_cate)) {
		$rows_cate = $result_cate -> fetch_all(MYSQLI_NUM);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $bookname; ?></title>
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<?php include 'topbar.php'; ?>
	<?php include 'banner.php'; ?>
	<div class="detailPage">
		<div class="container">
			<div class="detail-left">
				<img src="<?php echo $rows[9]; ?>" class="detail-pic">
			</div>
			<div class="detail-center">
				<h4 class="detail-name">《<?php echo $rows[0]; ?>》</h4>
				<div class="det-info">
					<p>
						<span class="det-price">售价：<?php echo $rows[1]; ?> ￥</span>
						<span class="det-score">评分：<?php echo $rows[2]; ?></span>
					</p>
					<p>
						<span class="det-author">作者：<?php echo $rows[3]; ?></span>
						<span class="det-publish">出版社：<?php echo $rows[4]; ?></span>
					</p>
					<p>
						<span class="det-putTime">出版时间：<?php echo $rows[5]; ?></span>
						<span class="det-wordcount">字数：<?php echo $rows[6]; ?></span>
					</p>
					<p><span class="det-cate">分类：<?php echo $rows[7]; ?></span></p>
				</div>
				<div class="det-center-botm">
					<input type="button" value="加入购物车">
					<input type="button" value="收藏">
					<input type="button" value="立即购买">
				</div>
			</div>
			<div class="det-right">
				<h4>你可能喜欢</h4>
				<div class="det-right-recom">
					<?php
						for($i=0;$i<10;$i++) {
							echo "<a href='detailPage.php?name={$rows_cate[$i][0]}&cate={$rows_cate[$i][7]}' class='det-recom-item'>
									<img src='{$rows_cate[$i][9]}'>{$rows_cate[$i][0]}</a>";
						}
					?>
				</div>
			</div>
			<div class="det-bottom">
				<div class="det-btom-header">
					<a href="javascript:;">介绍</a>
				</div>
				<div class="det-btom-con">
					<p class="det-desc"><?php echo $rows[8]; ?></p>
				</div>
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript">
		var history_bookname = $(".detail-name").text().slice(1, -1);
		$.ajax({
			method: 'POST',
			url: 'addToHistory.php',
			data: {history_bookname: history_bookname},
			async: true,
			contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
			dataType: 'text'
		});
	</script>
</body>
</html>
