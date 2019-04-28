<?php
############################################
#
# SCRIPT概要
# 下記の形式に配列にセットして表示させる
# ex.)
# "東北地方" => [
# "県名" => [県名2, ...],
# "市町村名" => [市町村名2, ...],
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
$hokkaido_region = array();
$touhoku_region = array();
$kanto_region = array();
$tyubu_region = array();
$kansai_region = array();
$tyugoku_region = array();
$sikoku_region = array();
$kyusyu_okinawa_region = array();

function region_merge($key, $val) {
/*
  関数概要
  以下の配列を作成
  "県名" => [県名2, ...],
  "市町村名" => [市町村名2, ...]
*/

global $result;

// ひとつの県名、紐づく市町村のみ出力
// ex.)北海道のみ、北海道に紐づく市町村のみ
$one_prefecture_name = array_slice($result, $key, $val);

  foreach ($one_prefecture_name as $key1 => $value1) {

    // 県名配列の最後に$key1(県名)を格納
    $region_array['県名'][] = $key1;

    foreach ($value1 as $key2 => $value2) {

      // 市町村配列の最後に$value2(市町村)を格納
      $region_city_name['市町村'][] = $value2;

    }
  }
  // $region_array(県名配列)と$region_city_name(市町村配列)をマージ
  return array_merge_recursive($region_array,$region_city_name);
}


foreach ($ary_data as $key => $value) {
  foreach($value as $key => $value) {

    //  都道府県名を$prefecture_nameをに格納
    //  print_r()の出力結果を変数に格納
    $prefecture_name = print_r($value['name'], true);

    // key(city)の値のみ抽出
    $city_name = array_column($value['city'], 'city');
    // 連想配列に格納
    $result[$prefecture_name] = $city_name;
  }
}

// 各地方配列に関数で抽出した配列を格納
$hokkaido_region = array('北海道地方' => region_merge(0,1));
$touhoku_region = array('東北地方' => region_merge(1, 6));
$kanto_region = array('関東地方' => region_merge(7, 7));
$tyubu_region = array('中部地方' => region_merge(14, 9));
$kansai_region = array('関西地方' => region_merge(23, 7));
$tyugoku_region = array('中国地方' => region_merge(30, 5));
$sikoku_region = array('四国地方' => region_merge(35, 4));
$kyusyu_okinawa_region = array('九州地方・沖縄地方' => region_merge(39, 8));

// 各地方の配列をマージ
print_r(array_merge_recursive($hokkaido_region,$touhoku_region,$kanto_region,$tyubu_region,$kansai_region,$kansai_region,$sikoku_region,$kyusyu_okinawa_region));
?>
