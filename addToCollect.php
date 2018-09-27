<?php
$link = mysqli_connect("localhost:3306","root","root","bishe");

$user = isset($_COOKIE['tel'])?htmlspecialchars($_COOKIE['tel']):"";

// 添加到收藏

if (isset($_POST['bookname'])) {
  if ($user != "") {
    $sql_insert_coll = "insert into collect (bookname,tel) values ('{$_POST['bookname']}', '{$user}')";
    if ($link -> query($sql_insert_coll)) {
      echo "已添加";
      return true;
    } else {
      echo "添加到收藏失败";
    }
  } else {
    echo "请先登录";
    return false;
  }
}
?>
