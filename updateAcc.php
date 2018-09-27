<?php
	$link = mysqli_connect("localhost:3306","root","root","bishe");
  $user = isset($_COOKIE['tel'])?htmlspecialchars($_COOKIE['tel']):"";
  if (isset($_POST['accInfo'])) {
    if ($user != "") {
      $nicheng = $_POST['accInfo'][0];
      $number = $_POST['accInfo'][1];
      $address = $_POST['accInfo'][2];
      $zip = $_POST['accInfo'][3];

      $accSql = "update account set nicheng='{$nicheng}',number='{$number}',address='{$address}',zip='{$zip}' where tel=".$user;

      if ($link -> query($accSql)) {
        echo "修改成功";
        return true;
      } else {
        echo "修改失败";
        return false;
      }
    } else {
      echo "请先登录";
      return false;
    }
  }
?>
