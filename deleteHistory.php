<?php
  $bookname = isset($_POST['historyBook'])?htmlspecialchars($_POST['historyBook']):"";
  if ($bookname != "") {
    if (isset($_COOKIE['history'])) {
      $historyArr = json_decode($_COOKIE['history'], true);
      // print_r(json_decode($_COOKIE['history'],true));
      foreach($historyArr as $key => $val) {
        if ($val == $bookname) {
          unset($historyArr[$key]);
          echo "删除历史记录成功！";
          break;
        }
      }

      if (count($historyArr) == 0) {
        setcookie("history", json_encode($historyArr), time()-3600);
        return true;
      } else {
        setcookie("history", json_encode($historyArr), time()+3600);
        return true;
      }
    } else {
      echo "历史记录不存在";
      return false;
    }
  } else {
    echo "参数传递错误";
    return false;
  }
?>
