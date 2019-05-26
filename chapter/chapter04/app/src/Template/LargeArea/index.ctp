<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>index</title>
</head>
<body>
<p>large_area index</p>

<table border="1">
  <tr>
    <th>地方名</th>
    <th>県名</th>
    <th>ID番号</th>
    <th>作成時間</th>
    <th>変更時間</th>
  </tr>

  <?php foreach ($res as $record): ?>
    <tr>

      <td><?= h($record->prefecture_name) ?></td>
      <td><?= $this->form->postLink($record['name'], ["controller" => "City", "action" => 'index', $record['prefecture_id']], ['data' => $record['prefecture_id']]); ?></td>
      <td><?= h($record->prefecture_id) ?></td>
      <td><?= h($record->CREATE_AT) ?></td>
      <td><?= h($record->UPDATE_AT) ?></td>

    </td>
    </tr>

  <?php endforeach; ?>

</table>
</body>
</html>
1
