<?php
###########################################
#
# script概要
# jsonファイルを読み込んで
#  各都道府県名（キー名：name）を表示させる
#
##########################################

// FILEのディレクトリパス取得
$script_path = pathinfo(__FILE__, PATHINFO_DIRNAME);

// JSONdata
$jsondata = "$script_path/sample.json";

// JSONの中身を文字列として全て読み込む
$json = file_get_contents($jsondata);

###################
// DEBUG 中身を出力
// var_dump($json);
###################

// 連想配列にデコード
$ary_data = json_decode($json, true);

#####################
// DEBUG 中身を出力
// print_r($ary_data);
#####################

// nameキー(都道府県名)の取得
foreach ($ary_data as $key => $value) {
  foreach ($value as $key => $value) {

    // n番目と都道府県名を出力
    echo "$key" . "番目の" . "都道府県名は" . $value['name'] . "\n";

  }
}
?>
