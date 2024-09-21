<?php
// `data.csv`ファイルの読み込み
$file = fopen('data.csv', 'r');

echo "<h1>体調管理データ</h1>";
echo "<table border='1'>";
echo "<tr><th>名前</th><th>日付</th><th>体温</th><th>朝ごはん</th><th>体調</th><th>症状</th><th>睡眠</th><th>食欲</th><th>便</th><th>メモ</th><th>保護者確認</th></tr>";

while ($line = fgetcsv($file)) {
echo "<tr>";
foreach ($line as $cell) {
echo "<td>" . htmlspecialchars($cell) . "</td>";
}
echo "</tr>";
}

echo "</table>";
fclose($file);
?>

