<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<title>ももだいの体調管理アプリ</title>
<style>
img.selected {
border: 2px solid rgb(199, 229, 255);
}
</style>
</head>
<body>
<h1>ももだいの体調管理アプリ</h1>
<form action="write.php" method="post">

<!-- 名前の入力 -->
<label for="name">名前</label>
<select name="name" id="name">
<option value="もも">もも</option>
<option value="だい">だい</option>
</select><br><br>

<!-- 日付の入力 -->
<label for="date">日付</label>
<input type="date" name="date" id="date"><br><br>

<!-- 体温の入力 -->
<label for="temperature">体温</label>
<div id="temperature-controls">
<button type="button" onclick="changeTemp(-0.1)">−</button>
<input type="number" name="temperature" id="temperature" step="0.1" value="36.0"> °C
<button type="button" onclick="changeTemp(0.1)">＋</button>
</div><br><br>

<!-- 朝ごはんの入力 -->
<label for="breakfast">朝ごはん</label>
<input type="radio" name="breakfast" value="食べた">食べた
<input type="radio" name="breakfast" value="食べてない">食べてない<br><br>

<!-- 体調の入力 -->
<label for="health">体調</label><br>
<img src="./img/good.png" alt="いい" data-type="health" class="selectable" style="width:100px; height:100px;" data-value="いい">
<img src="./img/soso.png" alt="ふつう" data-type="health" class="selectable" style="width:100px; height:100px;" data-value="ふつう">
<img src="./img/bad.png" alt="わるい" data-type="health" class="selectable" style="width:100px; height:100px;" data-value="わるい">
<input type="hidden" name="health" id="health"><br><br>

<!-- 症状の入力 -->
<label for="symptoms">どんな症状？</label><br>
<input type="checkbox" name="symptoms[]" value="喉が痛い">喉が痛い
<input type="checkbox" name="symptoms[]" value="顔色が悪い">顔色が悪い
<input type="checkbox" name="symptoms[]" value="頭が痛い">頭が痛い
<input type="checkbox" name="symptoms[]" value="鼻水が出る">鼻水が出る
<input type="checkbox" name="symptoms[]" value="せき・くしゃみが出る">せき・くしゃみが出る
<input type="checkbox" name="symptoms[]" value="体がだるい">体がだるい
<input type="checkbox" name="symptoms[]" value="お腹が痛い">お腹が痛い<br><br>

<!-- 睡眠の入力 -->
<label for="sleep">睡眠</label><br>
<img src="./img/good.png" alt="いい" data-type="sleep" class="selectable" style="width:100px; height:100px;" data-value="いい">
<img src="./img/soso.png" alt="ふつう" data-type="sleep" class="selectable" style="width:100px; height:100px;" data-value="ふつう">
<img src="./img/bad.png" alt="わるい" data-type="sleep" class="selectable" style="width:100px; height:100px;" data-value="わるい">
<input type="hidden" name="sleep" id="sleep"><br><br>

<!-- 食欲の入力 -->
<label for="appetite">食欲</label><br>
<img src="./img/good.png" alt="いい" data-type="appetite" class="selectable" style="width:100px; height:100px;" data-value="いい">
<img src="./img/soso.png" alt="ふつう" data-type="appetite" class="selectable" style="width:100px; height:100px;" data-value="ふつう">
<img src="./img/bad.png" alt="わるい" data-type="appetite" class="selectable" style="width:100px; height:100px;" data-value="わるい">
<input type="hidden" name="appetite" id="appetite"><br><br>

<!-- 便の入力 -->
<label for="bowel">便</label><br>
<img src="./img/good.png" alt="いい" data-type="bowel" class="selectable" style="width:100px; height:100px;" data-value="いい">
<img src="./img/soso.png" alt="ふつう" data-type="bowel" class="selectable" style="width:100px; height:100px;" data-value="ふつう">
<img src="./img/bad.png" alt="わるい" data-type="bowel" class="selectable" style="width:100px; height:100px;" data-value="わるい">
<input type="hidden" name="bowel" id="bowel"><br><br>

<!-- メモの入力 -->
<label for="memo">メモ</label><br>
<textarea name="memo" id="memo" rows="4" cols="40"></textarea><br><br>

<!-- 保護者確認 -->
<label for="guardian">保護者確認</label>
<input type="checkbox" name="guardian" value="確認済">確認済<br><br>

<!-- 送信ボタン -->
<input type="submit" value="送信">
</form>

<script>
// 体温増減のJavaScript
function changeTemp(change) {
let tempInput = document.getElementById('temperature');
let currentTemp = parseFloat(tempInput.value);
tempInput.value = (currentTemp + change).toFixed(1);
}

// 選択された画像に枠線を付ける関数
document.querySelectorAll('.selectable').forEach(img => {
img.addEventListener('click', function() {
const type = img.getAttribute('data-type');
document.querySelectorAll(`img[data-type="${type}"]`).forEach(i => i.classList.remove('selected'));
img.classList.add('selected');
document.getElementById(type).value = img.getAttribute('data-value');
});
});
</script>
</body>
</html>



