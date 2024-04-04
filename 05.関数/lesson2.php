<?php
// 以下をそれぞれ表示してください。（すべて改行を行って出力すること)
// 現在時刻を自動的に取得するPHPの関数があるので調べて実装してみて下さい。
// 実行するとその都度現在の日本の日時に合わせて出力されるされるようになればOKです。
// 日時がおかしい場合、PHPのタイムゾーン設定を確認して下さい。


// ・現在日時（xxxx年xx月xx日（x曜日））
// ・現在日時から３日後（yyyy年mm月dd日 H時i分s秒）
// ・現在日時から１２時間前（yyyy年mm月dd日 H時i分s秒）
// ・2020年元旦から現在までの経過日数 (ddd日)

date_default_timezone_set('Asia/Tokyo');
$today = "Y年m月d日";
$arr = ["日", "月", "火", "水", "木", "金", "土"];
$weekday = $arr[date("w")] . "曜日";
$time = "H時i分s秒";

echo date("現在日時 ($today ($weekday))");
echo "<br>";
echo date("現在日時から３日後 ($today $time)", strtotime("+3 day"));
echo "<br>";
echo date("現在日時から１２時間前 ($today $time)", strtotime("-12 hour"));
echo "<br>";
$today = "Y-m-d";
$today_com = date($today);
$today_com = strtotime($today_com);
$today_ago = strtotime("2020-01-01");
echo "2020年元旦から現在までの経過日数(".($today_com - $today_ago) / (60 * 60 * 24) . "日)";
