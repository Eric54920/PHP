<?php
$link = mysqli_connect("localhost:3306","root","root","bishe");

$user = isset($_COOKIE['tel'])?htmlspecialchars($_COOKIE['tel']):"";

// 添加到订单

if(isset($_POST['orderInfo'])) {
  if ($user != "") {
    $data = json_decode($_POST['orderInfo']);
    for($i=0;$i<count($data);$i++) {
      $sql_order = "insert into `order` (bookname,tel,number) values ('{$data[$i][0]}','{$user}','{$data[$i][1]}')";
      if ($link -> query($sql_order)) {
        continue;
      } else {
        echo "添加订单失败";
        return false;
      }
    }
    echo "已添加到订单列表";
    return true;
  } else {
    echo "请先登录！";
    return false;
  }
} else {
  echo "orderInfo 不存在";
  return false;
}

 ?>
