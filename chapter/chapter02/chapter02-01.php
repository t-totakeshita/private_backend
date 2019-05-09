<?php
#################################
# 
#  関数概要
#  特殊文字を文字列に変換(XSS対策)
#
#################################
function myhtmlspecialchars($string) {
  // 関数名は汎用性を持たせる為に短名推奨との事ですが、今回は覚える為に正式名称としています。

  // 変数が配列か判定
  if (is_array($string)) {
    // 配列の要素全て(文字列)に対して、特殊文字を文字列に変換
    return array_map("myhtmlspecialchars", $string);

  } else {

    // 特殊文字を文字列に変換
    return htmlspecialchars($string, ENT_QUOTES, "UTF-8");
  }
}


$message = $_GET['message'];
echo myhtmlspecialchars($message);
print_r (myhtmlspecialchars($_GET));

?>

<!DOCTYPE html>
<html lang = "ja">
<head><meta charset = "UFT-8"></head>
<body>
<form action = "index.php" method = "get">
<input type = "text" name ="message"><br/>
<input type="checkbox" name="hoby[]" value="musicappreciation">音楽鑑賞<br/>
<input type="checkbox" name="hoby[]" value="moviegoing">映画鑑賞<br/>
<input type="checkbox" name="hoby[]" value="reading">読書<br/>
<input type="checkbox" name="hoby[]" value="fishing">釣り<br/>
<input type = "submit" value ="submit">
</form>
</body>
</html>
