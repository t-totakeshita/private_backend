# 地方名、県名を取得
SELECT prefecture_name, name FROM large_area;

# 北海道地方(地方名、県名)取得
SELECT prefecture_name AS "地方名", name AS "県名" FROM large_area WHERE prefecture_name = "北海道地方";

# 東北地方(地方名、県名)取得
SELECT prefecture_name AS "地方名", name AS "県名" FROM large_area WHERE prefecture_name = "東北地方";

# 関東地方(地方名、県名)取得
SELECT prefecture_name AS "地方名", name AS "県名" FROM large_area WHERE prefecture_name = "関東地方";

# 中部地方(地方名、県名)取得
SELECT prefecture_name AS "地方名", name AS "県名" FROM large_area WHERE prefecture_name = "中部地方";

# 関西地方(地方名、県名)取得
SELECT prefecture_name AS "地方名", name AS "県名" FROM large_area WHERE prefecture_name = "関西地方";

# 中国地方(地方名、県名)取得
SELECT prefecture_name AS "地方名", name AS "県名" FROM large_area WHERE prefecture_name = "中国地方";

# 四国地方(地方名、県名)取得
SELECT prefecture_name AS "地方名", name AS "県名" FROM large_area WHERE prefecture_name = "四国地方";

# 九州地方・沖縄地方(地方名、県名)取得
SELECT prefecture_name AS "地方名", name AS "県名" FROM large_area WHERE prefecture_name = "九州地方・沖縄地方";
