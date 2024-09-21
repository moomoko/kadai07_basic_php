<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// フォームから送信されたデータを取得
$name = $_POST['name'];
$date = $_POST['date'];
$temperature = $_POST['temperature'];
$breakfast = $_POST['breakfast'];
$health = $_POST['health'];
$symptoms = isset($_POST['symptoms']) ? implode(", ", $_POST['symptoms']) : "なし";
$sleep = $_POST['sleep'];
$appetite = $_POST['appetite'];
$bowel = $_POST['bowel'];
$memo = $_POST['memo'];
$guardian = isset($_POST['guardian']) ? $_POST['guardian'] : "未確認";

// データをCSV形式に変換
$data = "$name,$date,$temperature,$breakfast,$health,$symptoms,$sleep,$appetite,$bowel,$memo,$guardian\n";
echo $data;
// `data.csv`ファイルにデータを書き込む
$file = fopen('data.csv', 'a'); 
if (!$file) {
    die('Failed to open file.');
}

flock($file, LOCK_EX); 
if (fwrite($file, $data) === false) {
    die('Failed to write data.');
}
flock($file, LOCK_UN); 
fclose($file);

// 確認メッセージ
echo "データが保存されました。<a href='index.php'>戻る</a>";
?>



