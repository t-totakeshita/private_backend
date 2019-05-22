/* 
  prefectureテーブルよりnameカラム(AS 県名)を抽出
  cityテーブルよりnameカラム(AS 区の合計値)をカウント
*/
SELECT prefecture.name AS "県名", count(city.name) AS "区の合計値" FROM prefecture
# cityテーブルとprefectureテーブルを内部結合
INNER JOIN city ON prefecture.prefecture_id = city.prefecture_id
# cityテーブルのnameカラムに文字列"区"が存在するもののみ抽出
WHERE city.name LIKE "%区"
# prefectureテーブルのnameカラムをグループ化
GROUP BY prefecture.name
# cityテーブルのprefecture_id順にソート
ORDER BY city.prefecture_id;
