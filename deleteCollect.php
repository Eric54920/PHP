<?php
$link = mysqli_connect("localhost:3306","root","root","bishe");
$tel = isset($_COOKIE['tel'])?htmlspecialchars($_COOKIE['tel']):"";

$coll_bookname = isset($_POST['name'])?htmlspecialchars($_POST['name']):"";
// delete collect
if ($coll_bookname !== "") {
  if ($tel !== "") {
    $sql_coll = "delete from collect where bookname='{$coll_bookname}' and tel='{$tel}'";
    if ($link -> query($sql_coll)) {
      echo "删除成功";
      return true;
    } else {
      echo "删除失败";
      return false;
    }
  } else {
    echo "请先登录，再重试";
    return false;
  }
} else {
  return false;
}
?>
