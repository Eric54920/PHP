<?php
$tel = isset($_COOKIE['tel'])?htmlspecialchars($_COOKIE['tel']):"";
$level = isset($_COOKIE['level'])?htmlspecialchars($_COOKIE['level']):"";
if ($tel !== "") {
  $link = mysqli_connect("localhost:3306","root","root","bishe");
  $sql = "select * from account where tel={$tel}";
  $result = $link -> query ( $sql );
  $row_info = $result -> fetch_array(MYSQLI_NUM);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
    <title>Account</title>
  </head>
  <body>
    <!-- topBar -->
    <?php include 'topbar.php';?>
    <!-- 账户信息内容 -->
    <div class="info-content">
      <div class="container">
        <header class="acc-title">账户信息</header>
        <div class="base-info">
          <label for="">账号
            <input type="text" name="" value="<?php echo $row_info[0];?>" disabled>
          </label>
          <label for="">等级
            <input type="text" name="" value="<?php echo $row_info[2];?>" disabled>
          </label>
          <label for="">昵称
            <input type="text" name="" value="<?php echo $row_info[3];?>">
          </label>
          <label for="">手机
            <input type="text" name="" value="<?php echo $row_info[4];?>">
          </label>
        </div>
        <div class="money-info">
          <label for="">余额
            <input type="text" name="" value="<?php echo $row_info[5];?>" disabled>
          </label>
          <label for="">积分
            <input type="text" name="" value="<?php echo $row_info[6];?>" disabled>
          </label>
        </div>
        <div class="address">
          <label for="">地址
            <input type="text" name="" value="<?php echo $row_info[7];?>">
          </label>
          <label for="">邮编
            <input type="text" name="" value="<?php echo $row_info[8];?>">
          </label>
        </div>
        <div class="info-oper">
          <input type="button" class="save-info disabled" value="保存">
          <a href="index.php" class="back">返回</a>
        </div>
      </div>
    </div>
    <!-- footer -->
    <?php include 'footer.php';?>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
  </body>
</html>
