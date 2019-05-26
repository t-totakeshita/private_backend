<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>index</title>
</head>
<body>
<p>city index</p>

<table border="1">
  <tr>
    <th>ID番号</th>
    <th>県名</th>
    <th>市区町村番号</th>
    <th>作成時間</th>
    <th>変更時間</th>
  </tr>

  <?php foreach ($city as $record): ?>
    <tr>
      <td><?= h($record->prefecture_id) ?></td>
      <td><?= h($record->name) ?></td>
      <td><?= h($record->citycode) ?></td>
      <td><?= h($record->CREATE_AT) ?></td>
      <td><?= h($record->UPDATE_AT) ?></td>
    </td>
    </tr>

  <?php endforeach; ?>

</body>
</html>
