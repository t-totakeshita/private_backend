<?php
############################################
#
# SCRIPT概要
# userテーブルから20名表示させる
#
############################################

// FILEのディレクトリパス取得
$script_path = pathinfo(__FILE__, PATHINFO_DIRNAME);

// chapter02-03で使用する関数を呼び出し
require "$script_path/chapter02-03.php";


// DB接続情報を環境変数から呼び出し
// user名
$user = getenv('MYSQL_USER');
// パスワード
$pass = getenv('MYSQL_PASSWORD');
// データベース名
$db = getenv('MYSQL_DATABASE');
// ホスト名
$host = getenv('MYSQL_HOST');
// DB接続情報をまとめる
$dsn = "mysql:dbname=$db;host=$host;charset=utf8";

// SQL文作成
$sql = "SELECT * FROM users LIMIT 20";


// 異常終了回避の為の例外処理
try {

  // DB接続
  $dbh = new PDO ($dsn, $user, $pass );
  echo "DBへの接続に成功しました。" . "<br/>";
  
} catch ( PDOException $e ) {

  // DB接続失敗時出力
  echo "DBへの接続エラーです。:{$e->getMessage()}" . "<br/>";

  // DB接続を閉じる
  $dbh = null;
}

// chapter02-03.phpの関数呼び出し
$query = sql($result);


/*
   データの出力
 
  DBのカラム
  id, user_id, create_timestamp, update_timestam
*/
foreach ($query as $value ) {
  echo "IDは" . "$value[id]" . "：";
  echo "USER_IDは" . "$value[user_id]" . "：";
  echo "CREATE_TIMESTAMPは" . "$value[create_timestamp]" . "：";
  echo "UPDATE_TIMESTAMPは" . "$value[update_timestamp]" . "：" . "<br/>";
}

?>
