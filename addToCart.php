<?php
$link = mysqli_connect("localhost:3306","root","root","bishe");
$user = isset($_COOKIE['tel'])?htmlspecialchars($_COOKIE['tel']):"";

// 添加到购物车

if (isset($_POST['cart_bookname'])) {
  if ($user != "") {
    $sql_insert_cart = "insert into cart (bookname,tel) values ('{$_POST['cart_bookname']}', '{$user}')";
    if ($link -> query($sql_insert_cart)) {
      echo "已加入购物车";
      return true;
    } else {
      echo "已存在此商品";
      return false;
    }
  } else {
    if (isset($_COOKIE['cart'])) {
      $Arr = json_decode($_COOKIE['cart']);
      $bool = "true";
      foreach ($Arr as $key => $val) {
        if ($val == $_POST['cart_bookname']) {
          $bool = "false";
        } else {
          continue;
        }
      }
      if ($bool == "true") {
        array_push($Arr, $_POST['cart_bookname']);
        setcookie("cart", json_encode($Arr), time()+3600);
        echo "已加入购物车";
        return true;
      } else {
        echo "已存在此商品";
        return false;
      }
    } else {
      $Arr = array();
      array_push($Arr, $_POST['cart_bookname']);
      setcookie("cart", json_encode($Arr), time()+3600);
      echo "已加入购物车";
      return true;
    }
  }
}

?>
