<?php
	$link = mysqli_connect("localhost:3306","root","root","bishe");
	$tel = isset($_COOKIE['tel'])?htmlspecialchars($_COOKIE['tel']):"";
	$cart_bookname = isset($_POST['name'])?htmlspecialchars($_POST['name']):"";
	$del_history = isset($_POST['history'])?htmlspecialchars($_POST['history']):"";
	if ($cart_bookname !== "") {
		if ($tel !== "") {
			$sql_cart = "delete from cart where bookname='{$cart_bookname}' and tel='{$tel}'";
			if ($result = $link -> query($sql_cart)) {
				echo "删除成功";
				return true;
			} else {
				echo "删除失败";
				return false;
			}
		} else {
			if (isset($_COOKIE['cart'])) {
				$Arr = json_decode($_COOKIE['cart'], true);
				foreach($Arr as $key=>$val) {
					if($val == $cart_bookname) {
						unset($Arr[$key]);
						echo "删除成功";
						break;
					}
				}

				if (count($Arr) == 0) {
					setcookie("cart", json_encode($Arr), time()-3600);
					return true;
				} else {
					setcookie("cart", json_encode($Arr), time()+3600);
					return true;
				}
			} else {
				echo "购物车记录不存在";
				return false;
			}
		}
	} else {
		return false;
	}
?>
