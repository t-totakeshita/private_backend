<?php

#######################################################################
#
#  関数概要
#  SQLを渡して実行し結果を返す関数を作成する
#  本関数はchapter02-02で作成したchapter02-2.phpにて呼び出して使用する。
#
#######################################################################

function sql($result) {

  // chapter02-2.phpで定義
  global $dbh;
  global $sql;

  try{
    $result = $dbh->query($sql);
    echo "SQL文の実行成功しました。" . "<br/>";
  } catch ( PDOException $e ) {
    echo "SQL文の実行エラーです。" . "<br/>";
  }
  return $result;
}

?>
