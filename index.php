<?php
	$link = mysqli_connect("localhost:3306","root","root","bishe");
	$tel = isset($_COOKIE['tel'])?htmlspecialchars($_COOKIE['tel']):"";
	$level = isset($_COOKIE['level'])?htmlspecialchars($_COOKIE['level']):"";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>LOGO-首页</title>
		<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
	<body>
		<!-- topBar -->
		<?php include 'topbar.php'; ?>
		<!-- banner -->
		<?php include 'banner.php'; ?>
		<!-- hero -->
		<div class="hero">
			<div class="container">
				<ul class="categery">
					<li class="categery-item">
						<a href="javascript:;" class="categery-item-link">网络文学<span class="fa fa-chevron-right"></span></a>
						<div class="sub-menu">
							<ul class="menu-list">
								<?php
									$sql_login = "select * from bookstore where category='文学'";
									if ( $result  =  $link -> query ( $sql_login )) {
										$rows = $result -> fetch_all(MYSQLI_NUM);
										for($i=0;$i<10;$i++) {
											echo "<li class='menu-item'>
												<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' class='item-link'>
													<img src={$rows[$i][9]}>{$rows[$i][0]}
												</a>
											</li>";
										}
									}
								?>
							</ul>
						</div>
					</li>
					<li class="categery-item">
						<a href="javascript:;" class="categery-item-link">社科<span class="fa fa-chevron-right"></span></a>
						<div class="sub-menu">
							<ul class="menu-list">
								<?php
									$sql_login = "select * from bookstore where category='社科'";
									if ( $result  =  $link -> query ( $sql_login )) {
										$rows = $result -> fetch_all(MYSQLI_NUM);
										for($i=0;$i<10;$i++) {
											echo "<li class='menu-item'>
												<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' class='item-link'>
													<img src={$rows[$i][9]}>{$rows[$i][0]}
												</a>
											</li>";
										}
									}
								?>
							</ul>
						</div>
					</li>
					<li class="categery-item">
						<a href="javascript:;" class="categery-item-link">经管<span class="fa fa-chevron-right"></span></a>
						<div class="sub-menu">
							<ul class="menu-list">
								<?php
									$sql_login = "select * from bookstore where category='经管'";
									if ( $result  =  $link -> query ( $sql_login )) {
										$rows = $result -> fetch_all(MYSQLI_NUM);
										for($i=0;$i<10;$i++) {
											echo "<li class='menu-item'>
												<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' class='item-link'>
													<img src={$rows[$i][9]}>{$rows[$i][0]}
												</a>
											</li>";
										}
									}
								?>
							</ul>
						</div>
					</li>
					<li class="categery-item">
						<a href="javascript:;" class="categery-item-link">童书<span class="fa fa-chevron-right"></span></a>
						<div class="sub-menu">
							<ul class="menu-list">
								<?php
									$sql_login = "select * from bookstore where category='童书'";
									if ( $result  =  $link -> query ( $sql_login )) {
										$rows = $result -> fetch_all(MYSQLI_NUM);
										for($i=0;$i<10;$i++) {
											echo "<li class='menu-item'>
											<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' class='item-link'>
												<img src={$rows[$i][9]}>{$rows[$i][0]}
											</a>
											</li>";
										}
									}
								?>
							</ul>
						</div>
					</li>
					<li class="categery-item">
						<a href="javascript:;" class="categery-item-link">生活<span class="fa fa-chevron-right"></span></a>
						<div class="sub-menu">
							<ul class="menu-list">
								<?php
									$sql_login = "select * from bookstore where category='生活'";
									if ( $result  =  $link -> query ( $sql_login )) {
										$rows = $result -> fetch_all(MYSQLI_NUM);
										for($i=0;$i<10;$i++) {
											echo "<li class='menu-item'>
											<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' class='item-link'>
												<img src={$rows[$i][9]}>{$rows[$i][0]}
											</a>
											</li>";
										}
									}
								?>
							</ul>
						</div>
					</li>
					<li class="categery-item">
						<a href="javascript:;" class="categery-item-link">小说<span class="fa fa-chevron-right"></span></a>
						<div class="sub-menu">
							<ul class="menu-list">
								<?php
									$sql_login = "select * from bookstore where category='小说'";
									if ( $result  =  $link -> query ( $sql_login )) {
										$rows = $result -> fetch_all(MYSQLI_NUM);
										for($i=0;$i<10;$i++) {
											echo "<li class='menu-item'>
											<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' class='item-link'>
												<img src={$rows[$i][9]}>{$rows[$i][0]}
											</a>
											</li>";
										}
									}
								?>
							</ul>
						</div>
					</li>
					<li class="categery-item">
						<a href="javascript:;" class="categery-item-link">科教<span class="fa fa-chevron-right"></span></a>
						<div class="sub-menu">
							<ul class="menu-list">
								<?php
									$sql_login = "select * from bookstore where category='科教'";
									if ( $result  =  $link -> query ( $sql_login )) {
										$rows = $result -> fetch_all(MYSQLI_NUM);
										for($i=0;$i<10;$i++) {
											echo "<li class='menu-item'>
											<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' class='item-link'>
												<img src={$rows[$i][9]}>{$rows[$i][0]}
											</a>
											</li>";
										}
									}
								?>
							</ul>
						</div>
					</li>
					<li class="categery-item">
						<a href="javascript:;" class="categery-item-link">进口书<span class="fa fa-chevron-right"></span></a>
						<div class="sub-menu">
							<ul class="menu-list">
								<?php
									$sql_login = "select * from bookstore where category='进口书'";
									if ( $result  =  $link -> query ( $sql_login )) {
										$rows = $result -> fetch_all(MYSQLI_NUM);
										for($i=0;$i<10;$i++) {
											echo "<li class='menu-item'>
											<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' class='item-link'>
												<img src={$rows[$i][9]}>{$rows[$i][0]}
											</a>
											</li>";
										}
									}
								?>
							</ul>
						</div>
					</li>
					<li class="categery-item">
						<a href="javascript:;" class="categery-item-link">工具书<span class="fa fa-chevron-right"></span></a>
						<div class="sub-menu">
							<ul class="menu-list">
								<?php
									$sql_login = "select * from bookstore where category='工具书'";
									if ( $result  =  $link -> query ( $sql_login )) {
										$rows = $result -> fetch_all(MYSQLI_NUM);
										for($i=0;$i<10;$i++) {
											echo "<li class='menu-item'>
											<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' class='item-link'>
												<img src={$rows[$i][9]}>{$rows[$i][0]}
											</a>
											</li>";
										}
									}
								?>
							</ul>
						</div>
					</li>
				</ul>
				<div class="hero-slider">
					<div class="ui-viewport">
						<a href="" class="slide"><img src="image/99999990002232820_1_o.jpg" alt="" /></a>
						<a href="" class="slide"><img src="image/fhc750x315_wzh_20180105-0214-1518590314.jpg" alt="" /></a>
						<a href="" class="slide"><img src="image/750x315_djj_0130-1517294822.jpg" alt="" /></a>
						<a href="" class="slide"><img src="image/750x315_djj_0207-1518071286.jpg" alt="" /></a>
						<a href="" class="slide"><img src="image/750x315_0110-1515993543.jpg" alt="" /></a>
						<a href="" class="slide"><img src="image/750x315_dl_20180207-1518574893.jpg" alt="" /></a>
						<a href="" class="slide"><img src="image/dsgn750-315.jpg" alt="" /></a>
					</div>
					<div class="ui-controls-direction">
						<a class="fa prev">&#xf104</a>
						<a class="fa next">&#xf105</a>
					</div>
					<div class="ui-paper">
						<a class="ui-paper-link active" data-slide="0"></a>
						<a class="ui-paper-link" data-slide="1"></a>
						<a class="ui-paper-link" data-slide="2"></a>
						<a class="ui-paper-link" data-slide="3"></a>
						<a class="ui-paper-link" data-slide="4"></a>
						<a class="ui-paper-link" data-slide="5"></a>
						<a class="ui-paper-link" data-slide="6"></a>
					</div>
				</div>
				<div class="info">
					<div class="service">
						<div class="service-list">
							<a href="javascript:;" class="active-info">促销</a>
							<a href="javascript:;">公告</a>
						</div>
						<div class="service-con">
							<div class="qik-sale">
								<a href="javascript:;">年货9.9元秒杀</a>
								<a href="javascript:;">鲜花礼盒69抢211限时达</a>
								<a href="javascript:;">居家年货节3件7折</a>
								<a href="javascript:;">网络年货专场，低至18.9元</a>
							</div>
							<div class="news">
								<a href="javascript:;">2018年春节运营公告</a>
								<a href="javascript:;">启用全新客服电话“950618”</a>
								<a href="javascript:;">大家电订单超期自动取消公告</a>
								<a href="javascript:;">关于召回普利司通（天津）</a>
							</div>
						</div>
					</div>
					<div class="more">
						<a href="javascript:;"><span class="fa fa-heartbeat"></span>捐赠</a>
						<a href="javascript:;"><span class="fa fa-institution"></span>政府采购</a>
						<a href="javascript:;"><span class="fa fa-recycle"></span>回收</a>
						<a href="javascript:;"><span class="fa fa-gift"></span>礼品</a>
					</div>
				</div>
			</div>
		</div>
		<!-- recommend -->
		<div class="recommend">
			<div class="container">
				<h1 class="header">精品推荐</h1>
				<nav class="recommend-list">
					<a href="javascript:;" class="recommend-title" data-hover="网络文学">网络文学</a>
					<a href="javascript:;" class="recommend-title" data-hover="小说">小说</a>
					<a href="javascript:;" class="recommend-title" data-hover="童书">童书</a>
					<a href="javascript:;" class="recommend-title" data-hover="社科">社科</a>
					<a href="javascript:;" class="recommend-title" data-hover="生活">生活</a>
					<a href="javascript:;" class="recommend-title" data-hover="经管">经管</a>
					<a href="javascript:;" class="recommend-title" data-hover="科教">科教</a>
					<a href="javascript:;" class="recommend-title" data-hover="进口书">进口书</a>
					<a href="javascript:;" class="recommend-title" data-hover="工具书">工具书</a>
				</nav>
				<div class="reco-control">
					<a href="javascript:;" class="prev"><span class="fa fa-long-arrow-left"></span></a>
					<a href="javascript:;" class="next"><span class="fa fa-long-arrow-right"></span></a>
				</div>
				<div class="recom-con">
					<div class='wrapper'>
			<?php
				$sql_login = "select * from bookstore where category='文学'";
				if ( $result  =  $link -> query ( $sql_login )) {
					$rows = $result -> fetch_all(MYSQLI_NUM);
					for ($i=0;$i<10;$i++) {
						echo "<div class='recommend-item'>
								<img src={$rows[$i][9]} class='recom-item-pic'>
								<div class='recom-item-info'>
									<p class='recom-item-name'>《{$rows[$i][0]}》</p>
									<p class='recom-item-score'>评分：{$rows[$i][2]} 分</p>
									<a href='javascript:;' class='recom-item-author'>作者：<span>{$rows[$i][3]}</span></a>
									<p class='recom-item-desc'>{$rows[$i][8]}</p>
									<p class='recom-item-price'>价格：{$rows[$i][1]}<a href='detailPage.php?name={$rows[$i][0]}' target='_blank' class='recom-item-detail'>查看详细</a></p>
								</div>
							</div>";
					}
				}
			?>
					</div>
					<div class='wrapper'>
			<?php
				$sql_login = "select * from bookstore where category='小说'";
				if ( $result  =  $link -> query ( $sql_login )) {
					$rows = $result -> fetch_all(MYSQLI_NUM);
					for ($i=0;$i<10;$i++) {
						echo "<div class='recommend-item'>
								<img src={$rows[$i][9]} class='recom-item-pic'>
								<div class='recom-item-info'>
									<p class='recom-item-name'>《{$rows[$i][0]}》</p>
									<p class='recom-item-score'>评分：{$rows[$i][2]} 分</p>
									<a href='javascript:;' class='recom-item-author'>作者：<span>{$rows[$i][3]}</span></a>
									<p class='recom-item-desc'>{$rows[$i][8]}</p>
									<p class='recom-item-price'>价格：{$rows[$i][1]}<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' target='_blank' class='recom-item-detail'>查看详细</a></p>
								</div>
							</div>";
					}
				}
			?>
					</div>
					<div class='wrapper'>
			<?php
				$sql_login = "select * from bookstore where category='童书'";
				if ( $result  =  $link -> query ( $sql_login )) {
					$rows = $result -> fetch_all(MYSQLI_NUM);
					for ($i=0;$i<10;$i++) {
						echo "<div class='recommend-item'>
								<img src={$rows[$i][9]} class='recom-item-pic'>
								<div class='recom-item-info'>
									<p class='recom-item-name'>《{$rows[$i][0]}》</p>
									<p class='recom-item-score'>评分：{$rows[$i][2]} 分</p>
									<a href='javascript:;' class='recom-item-author'>作者：<span>{$rows[$i][3]}</span></a>
									<p class='recom-item-desc'>{$rows[$i][8]}</p>
									<p class='recom-item-price'>价格：{$rows[$i][1]}<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' target='_blank' class='recom-item-detail'>查看详细</a></p>
								</div>
							</div>";
					}
				}
			?>
					</div>
					<div class='wrapper'>
			<?php
				$sql_login = "select * from bookstore where category='社科'";
				if ( $result  =  $link -> query ( $sql_login )) {
					$rows = $result -> fetch_all(MYSQLI_NUM);
					for ($i=0;$i<10;$i++) {
						echo "<div class='recommend-item'>
								<img src={$rows[$i][9]} class='recom-item-pic'>
								<div class='recom-item-info'>
									<p class='recom-item-name'>《{$rows[$i][0]}》</p>
									<p class='recom-item-score'>评分：{$rows[$i][2]} 分</p>
									<a href='javascript:;' class='recom-item-author'>作者：<span>{$rows[$i][3]}</span></a>
									<p class='recom-item-desc'>{$rows[$i][8]}</p>
									<p class='recom-item-price'>价格：{$rows[$i][1]}<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' target='_blank' class='recom-item-detail'>查看详细</a></p>
								</div>
							</div>";
					}
				}
			?>
					</div>
					<div class='wrapper'>
			<?php
				$sql_login = "select * from bookstore where category='生活'";
				if ( $result  =  $link -> query ( $sql_login )) {
					$rows = $result -> fetch_all(MYSQLI_NUM);
					for ($i=0;$i<10;$i++) {
						echo "<div class='recommend-item'>
								<img src={$rows[$i][9]} class='recom-item-pic'>
								<div class='recom-item-info'>
									<p class='recom-item-name'>《{$rows[$i][0]}》</p>
									<p class='recom-item-score'>评分：{$rows[$i][2]} 分</p>
									<a href='javascript:;' class='recom-item-author'>作者：<span>{$rows[$i][3]}</span></a>
									<p class='recom-item-desc'>{$rows[$i][8]}</p>
									<p class='recom-item-price'>价格：{$rows[$i][1]}<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' target='_blank' class='recom-item-detail'>查看详细</a></p>
								</div>
							</div>";
					}
				}
			?>
					</div>
					<div class='wrapper'>
			<?php
				$sql_login = "select * from bookstore where category='经管'";
				if ( $result  =  $link -> query ( $sql_login )) {
					$rows = $result -> fetch_all(MYSQLI_NUM);
					for ($i=0;$i<10;$i++) {
						echo "<div class='recommend-item'>
										<img src={$rows[$i][9]} class='recom-item-pic'>
										<div class='recom-item-info'>
											<p class='recom-item-name'>《{$rows[$i][0]}》</p>
											<p class='recom-item-score'>评分：{$rows[$i][2]} 分</p>
											<a href='javascript:;' class='recom-item-author'>作者：<span>{$rows[$i][3]}</span></a>
											<p class='recom-item-desc'>{$rows[$i][8]}</p>
											<p class='recom-item-price'>价格：{$rows[$i][1]}<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' target='_blank' class='recom-item-detail'>查看详细</a></p>
										</div>
							</div>";
					}
				}
			?>
					</div>
					<div class='wrapper'>
			<?php
				$sql_login = "select * from bookstore where category='科教'";
				if ( $result  =  $link -> query ( $sql_login )) {
					$rows = $result -> fetch_all(MYSQLI_NUM);
					for ($i=0;$i<10;$i++) {
						echo "<div class='recommend-item'>
										<img src={$rows[$i][9]} class='recom-item-pic'>
										<div class='recom-item-info'>
											<p class='recom-item-name'>《{$rows[$i][0]}》</p>
											<p class='recom-item-score'>评分：{$rows[$i][2]} 分</p>
											<a href='javascript:;' class='recom-item-author'>作者：<span>{$rows[$i][3]}</span></a>
											<p class='recom-item-desc'>{$rows[$i][8]}</p>
											<p class='recom-item-price'>价格：{$rows[$i][1]}<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' target='_blank' class='recom-item-detail'>查看详细</a></p>
										</div>
							</div>";
					}
				}
			?>
					</div>
					<div class='wrapper'>
			<?php
				$sql_login = "select * from bookstore where category='进口书'";
				if ( $result  =  $link -> query ( $sql_login )) {
					$rows = $result -> fetch_all(MYSQLI_NUM);
					for ($i=0;$i<10;$i++) {
						echo "<div class='recommend-item'>
										<img src={$rows[$i][9]} class='recom-item-pic'>
										<div class='recom-item-info'>
											<p class='recom-item-name'>《{$rows[$i][0]}》</p>
											<p class='recom-item-score'>评分：{$rows[$i][2]} 分</p>
											<a href='javascript:;' class='recom-item-author'>作者：<span>{$rows[$i][3]}</span></a>
											<p class='recom-item-desc'>{$rows[$i][8]}</p>
											<p class='recom-item-price'>价格：{$rows[$i][1]}<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' target='_blank' class='recom-item-detail'>查看详细</a></p>
										</div>
							</div>";
					}
				}
			?>
					</div>
					<div class='wrapper'>
			<?php
				$sql_login = "select * from bookstore where category='工具书'";
				if ( $result  =  $link -> query ( $sql_login )) {
					$rows = $result -> fetch_all(MYSQLI_NUM);
					for ($i=0;$i<10;$i++) {
						echo "<div class='recommend-item'>
										<img src={$rows[$i][9]} class='recom-item-pic'>
										<div class='recom-item-info'>
											<p class='recom-item-name'>《{$rows[$i][0]}》</p>
											<p class='recom-item-score'>评分：{$rows[$i][2]} 分</p>
											<a href='javascript:;' class='recom-item-author'>作者：<span>{$rows[$i][3]}</span></a>
											<p class='recom-item-desc'>{$rows[$i][8]}</p>
											<p class='recom-item-price'>价格：{$rows[$i][1]}<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' target='_blank' class='recom-item-detail'>查看详细</a></p>
										</div>
							</div>";
					}
				}
			?>
					</div>
				</div>
			</div>
		</div>
		<!-- content -->
		<div class="content">
			<div class="container">
				<div class="con-wrapper">
<?php
	$sql_login = "select * from bookstore";
	if ( $result  =  $link -> query ( $sql_login )) {
		$rows = $result -> fetch_all(MYSQLI_NUM);
		for($i=0;$i<90;$i++) {
			echo "<div class='content-item'>
					<img src={$rows[$i][9]} class='item-pic'>
					<div class='item-info'>
						<p class='item-name'>《{$rows[$i][0]}》</p>
						<p class='item-score'>评分：{$rows[$i][2]} 分</p>
						<a href='javascript:;' class='item-author'>作者：<span>{$rows[$i][3]}</span></a>
						<p class='item-desc'>{$rows[$i][8]}</p>
						<p class='item-price'>{$rows[$i][1]} ￥<a href='detailPage.php?name={$rows[$i][0]}&cate={$rows[$i][7]}' class='item-detail'>查看详细</a></p>
					</div>
				</div>";
		}
	}
?>
				</div>
			</div>
		</div>

		<!-- footer -->
		<?php include 'footer.php';?>
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
	</body>
</html>
