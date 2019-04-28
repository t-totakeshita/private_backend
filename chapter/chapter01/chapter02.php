<?php
############################################
#
# SCRIPT概要
# 下記の形式に配列にセットして表示させる
# ex.)
# "都道府県名A" => [市町村名1, 市町村名2...],
# "都道府県名B" => [市町村名3, 市町村名4...],
#
############################################

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

// 配列の初期化
$result = array();

foreach ($ary_data as $key => $value) {
  foreach($value as $key => $value) {

    //  都道府県名を$prefecture_nameをに格納
    //  print_r()の出力結果を変数に格納
    $prefecture_name = print_r($value['name'], true);

    // key(city)の値のみ抽出
    $city_name = array_column($value['city'], 'city');
    // 配列に格納
    $result[$prefecture_name] = $city_name;
    print_r($result);
  }
}
?>
