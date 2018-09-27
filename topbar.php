<?php
	if (isset($_COOKIE['tel'])) {
		$sql_sel_level = "select * from account where tel={$_COOKIE['tel']}";
		$result = $link -> query($sql_sel_level);
		$row = $result -> fetch_array(MYSQLI_NUM);
	}
?>
<div class="top">
	<div class="container">
		<div class="top-left">
			<button class="location">
				<span class="fa fa-map-marker"></span>
				<span class="loc-addr">北京</span>
				<div class="location-menu">
				<?php
					$addrArr = array("北京","上海","天津","重庆","河北","山西","河南","辽宁","吉林",
					"黑龙江","内蒙古","江苏","山东","安徽","浙江","福建","湖北","湖南","广西","广东",
					"江西","四川","海南","贵州","云南","西藏","陕西","甘肃","青海","宁夏","新疆",
					"港澳","台湾","钓鱼岛","海外");
					for($i=0;$i<count($addrArr);$i++) {
						echo "<span>{$addrArr[$i]}</span>";
					}
				 ?>
				</div>
			</button>
			<?php
				if (!isset($_COOKIE['tel'])) {
					echo "<a href='home.php'>注册</a>
					<a href='javascript:;' class='login-btn'>登录</a>
						<div class='login-modal'>
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='modal-header'>
										<h4>登录<span class='fa fa-close close-btn'></span></h4>
									</div>
									<div class='modal-body'>
										<form action='ajax.php' class='login-form' method='post'>
											<label for='tel'>
												<span class='fa fa-phone'></span>
												<input type='tel' class='inp' name='tel'>
											</label>
											<label for='pwd'>
												<span class='fa fa-lock'></span>
												<input type='password' class='inp' name='pwd' autocomplete='off'>
											</label>
											<input type='button' value='登 录'>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class='login-backdrop'></div>";
				}
			?>
		</div>
		<ul class="top-right">
			<li class="top-right-item">
				<a href="javascript:;">个人中心</a>
				<ul class="right-item-list account">
					<?php
						if (isset($_COOKIE['tel'])) {
							echo "<a href='javascript:;' class='pic'></a>
								<a href='javascript:;' class='name'>{$row[3]}</a>
								<span>
									<a href='javascript:;' class='level'>Lv {$row[2]}</a>
									<a href='javascript:;' class='vip'>
										<span class='fa fa-vimeo-square'></span>
									</a>
								</span>
								<a href='account.php' class='account-info'>账 户</a>
								<a href='javascript:;' class='exit'>退 出</a>";
						} else  {
							echo "<p class='no-login'>您还未登录</p>";
						}
					?>
				</ul>
			</li>
			<li class="top-right-item">
				<a href="javascript:;"><span class="fa fa-shopping-cart"></span> 购物车</a>
				<ul class="right-item-list cart">
				<?php
					if (isset($_COOKIE['tel'])) {
						if (isset($_COOKIE['cart'])) {
							$Arr = json_decode($_COOKIE['cart'], true);
							foreach ($Arr as $key => $val) {
								$sql_insert_cart = "insert into cart (bookname, tel) values ('{$val}', '{$_COOKIE['tel']}')";
								$result = $link -> query($sql_insert_cart);
							}
						}
						$sql_cart = "select b.* from cart a join bookstore b where a.bookname = b.bookname and a.tel = '{$_COOKIE['tel']}'";
						if (count($result_cart = $link -> query($sql_cart)) > 0) {
							$det_row = $result_cart -> fetch_all(MYSQLI_NUM);
							if (count($det_row) > 0) {
								for($i=0;$i<count($det_row);$i++) {
									echo "<li class='cart-item'>
									<label for='ckbox'>
									<input type='checkbox' name='ckbox' class='checkbox'>
									</label>
									<img src={$det_row[$i][9]}>
									<div class='cart-item-center'>
									<p class='name'>《{$det_row[$i][0]}》</p>
									<p class='price'>单价 <span>{$det_row[$i][1]}</span>￥</p>
									</div>
									<div class='cart-item-right'>
									<a href='javascript:;' class='watch-order'>
									<span class='fa fa-calculator'></span>
									</a>
									<a href='javascript:;' class='delete-order'>
									<span class='fa fa-trash-o'></span>
									</a>
									</div>
									</li>";
								}
							} else {
								echo "<p class='no-login'>还是空空的哦~</p>";
							}
						} else {
							echo "查询失败";
						}
					} else {
						echo "<p class='no-login'>您还未登录</p>";
						if (isset($_COOKIE['cart'])) {
							$Arr = json_decode($_COOKIE['cart'], true);
							foreach ($Arr as $key => $val) {
								$cart_sql = "select picture,price from bookstore where bookname='{$val}'";
								if ($result = $link -> query($cart_sql)){
									$rows_cart = $result -> fetch_array(MYSQLI_NUM);
									echo "<li class='cart-item'>
									<label for='ckbox'>
									<input type='checkbox' name='ckbox' class='checkbox'>
									</label>
									<img src={$rows_cart[0]}>
									<div class='cart-item-center'>
									<p class='name'>《{$val}》</p>
									<p class='price'>单价 <span>{$rows_cart[1]}</span>￥</p>
									</div>
									<div class='cart-item-right'>
									<a href='javascript:;' class='watch-order'><span class='fa fa-calculator'></span></a>
									<a href='javascript:;' class='delete-order'><span class='fa fa-trash-o'></span></a>
									</div>
									</li>";
								}
							}
						}
					}
				?>
					<div class="cart-info">
						<div class="cart-info-num">
							<span>总数(件)</span>
							<span></span>
						</div>
						<div class="cart-info-price">
							<span>共计(元)</span>
							<span></span>
						</div>
						<div class="cart-info-pay">
							<label for="">
								<input type="checkbox" class="select-all"> 全选
							</label>
							<a href="javascript:;" class="settlement">结算</a>
						</div>
					</div>
				</ul>
			</li>
			<li class="top-right-item">
				<a href="javascript:;">我的收藏</a>
				<ul class="right-item-list like">
					<?php
						if (isset($_COOKIE['tel'])) {
							$sql_collect = "select bookname from collect where tel='{$tel}'";
							$result_collect = $link -> query($sql_collect);
							$row = $result_collect -> fetch_all(MYSQLI_NUM);
							if (count($row) > 0) {
								for($i=0;$i<count($row);$i++) {
									$sql_det = "select * from bookstore where bookname='{$row[$i][0]}'";
									$result_det = $link -> query($sql_det);
									$det_row = $result_det -> fetch_array(MYSQLI_NUM);
									echo "<li class='like-item'>
											<img src={$det_row[9]}>
											<span class='name'>《{$det_row[0]}》</span>
											<div class='like-item-right'>
												<a href='detailPage.php?name={$det_row[0]}' class='watch-order'><span class='fa fa-eye'></span></a>
												<a href='javascript:;' class='delete-order'><span class='fa fa-trash-o'></span></a>
											</div>
										</li>";
								}
							} else {
								echo "<p class='no-login'>还没有收藏哦~</p>";
							}
						} else {
							echo "<p class='no-login'>您还未登录</p>";
						}
					?>
				</ul>
			</li>
			<li class="top-right-item">
				<a href="javascript:;">浏览记录</a>
				<ul class="right-item-list history">
					<?php
						if(isset($_COOKIE['history'])) {
							$historyArr = json_decode($_COOKIE['history'], true);
							foreach ($historyArr as $key => $val) {
							$sql_history = "select bookname,picture from bookstore where bookname='{$val}'";
							$result_history = $link -> query($sql_history);
							$row = $result_history -> fetch_array(MYSQLI_NUM);
								echo "<li class='history-item'>
									<img src={$row[1]}>
									<span class='desc'>《{$row[0]}》</span>
									<div class='history-item-right'>
										<a href='javascript:;' class='watch-order'><span class='fa fa-eye'></span></a>
										<a href='javascript:;' class='delete-order'><span class='fa fa-trash-o'></span></a>
									</div>
								</li>";
								}
							} else {
								echo "<p class='no-login'>还没有浏览记录哦~</p>";
							}
					?>
				</ul>
			</li>
			<li class="top-right-item">
				<a href="javascript:;">我的订单</a>
				<ul class="right-item-list order">
					<?php
					if (isset($_COOKIE['tel'])) {
						$orderSql = "select b.picture,b.bookname,a.number from `order` a join bookstore b on a.bookname = b.bookname where a.tel={$tel}";
						if ($orderResult = $link -> query($orderSql)) {
							$orderRow = $orderResult -> fetch_all(MYSQLI_NUM);
							if (count($orderRow) > 0) {
								for ($i=0;$i<count($orderRow);$i++) {
									echo "<li class='order-item'>
									<img src={$orderRow[$i][0]}>
									<span class='desc'>{$orderRow[$i][2]} × 《{$orderRow[$i][1]}》</span>
									</li>";
								}
							} else {
								echo "<p class='no-login'>没有订单~</p>";
							}
						} else {
							echo "查询失败";
						}
					} else {
						echo "<p class='no-login'>请先登录~</p>";
					}
					?>
				</ul>
			</li>
		</ul>
	</div>
</div>
