<?php
$tel = isset($_COOKIE['tel'])?htmlspecialchars($_COOKIE['tel']):"";
$level = isset($_COOKIE['level'])?htmlspecialchars($_COOKIE['level']):"";
$link = mysqli_connect("localhost:3306","root","root","bishe");
if ($tel !== "") {
  $sql = "select * from account where tel={$tel}";
  $result = $link -> query ( $sql );
  $row_info = $result -> fetch_array(MYSQLI_NUM);
}

if (isset($_GET['orderInfo'])) {
  if ($tel !== "") {
    $currOrder = "select a.number,b.bookname,b.price from `order` a join bookstore b where a.bookname=b.bookname order by a.id desc limit 0,{$_GET['orderInfo']}";
    if ($result = $link -> query($currOrder)) {
      $rows = $result -> fetch_all(MYSQLI_NUM);
    } else {
      echo "查询当前订单失败！";
      return false;
    }
  } else {
    echo "请先登录！";
    return false;
  }
} else {
  echo "参数不存在！";
  return false;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
    <title>支付成功</title>
  </head>
  <body>
    <!-- topBar -->
    <?php include 'topbar.php';?>
    <!-- banner -->
    <?php include "banner.php"; ?>
    <div class="paysuc">
      <div class="container">
        <div class="paysuc-con">
          <header>剁手成功！您的订单详情如下:</header>
          <table>
            <thead>
              <tr>
                <th>商品名称</th><th>数量(件)</th><th>单价(￥)</th><th>总价(￥)</th><th>订单详情</th>
              </tr>
            </thead>
            <tbody>
              <?php
                for($i=0;$i<count($rows);$i++) {
                  $totalPrice = $rows[$i][0] * $rows[$i][2];
                  echo "<tr><td>{$rows[$i][1]}</td><td>{$rows[$i][0]}</td><td>{$rows[$i][2]}</td><td>{$totalPrice}</td><td><button>取消订单</button></td></tr>";
                }
                ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- footer -->
    <?php include 'footer.php';?>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
  </body>
</html>
