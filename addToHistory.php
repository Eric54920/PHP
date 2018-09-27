<?php
  if (isset($_POST['history_bookname'])) {
    if (isset($_COOKIE['history'])) {
      $historyArr = json_decode($_COOKIE['history']);
      $bool = "true";
      foreach($historyArr as $key => $val) {
        if ($val == $_POST['history_bookname']) {
          unset($historyArr[$key]);
          $bool = "false";
        } else {
          continue;
        }
      }
      if ($bool == "true") {
        array_push($historyArr,$_POST['history_bookname']);
        setcookie("history", json_encode($historyArr), time()+3600);
        return true;
      } else {
        return false;
      }
    } else {
      $historyArr = array();
      array_push($historyArr, $_POST['history_bookname']);
      setcookie("history", json_encode($historyArr), time()+3600);
      return true;
    }
  } else {
    return false;
  }
?>
