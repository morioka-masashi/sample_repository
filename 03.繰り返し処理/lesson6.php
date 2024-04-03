<?php
// 以下配列の中身をfor文を使用して表示してください。
// 表が縦横に伸びてもある程度対応できるように柔軟な作りを目指してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */

$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
];

// 縦横に伸びた場合
// $arr = [
//     'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20, 'c4' => 20],
//     'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12, 'c4' => 20],
//     'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130, 'c4' => 20],
//     'r4' => ['c1' => 25, 'c2' => 9, 'c3' => 130, 'c4' => 20],
//     'r5' => ['c1' => 25, 'c2' => 9, 'c3' => 130, 'c4' => 20]
// ];

$row_keys = array_keys($arr);
$col_keys = array_keys($arr[$row_keys[0]]);
$rows = count($arr);
$cols = count($arr[$row_keys[0]]);


$header = "<th></th>";
for ($i = 0; $i < $cols; $i++) {
    $header .= "<th>{$col_keys[$i]}</th>";
}
$header .= "<th>横合計</th>";


$body_rows = "";
for ($j = 1; $j <= $rows; $j++) {
    $row_key = "r{$j}";
    $body_rows .= "<tr><td>{$row_key}</td>";
    for ($k = 1; $k <= $cols; $k++) {
        $c_key = "c{$k}";
        $body_rows .= "<td>{$arr[$row_key][$c_key]}</td>";
    }
    $rc_val = array_sum($arr[$row_key]);
    $body_rows .= "<td>{$rc_val}</td>";
}

$footer = "<th>縦合計</th>";
$sum = 0;
for ($i = 1; $i <= $cols; $i++) {
    $totals = array_sum(array_column($arr, "c{$i}"));
    $footer .= "<td>{$totals}</td>";
    $sum += $totals;
}
$footer .= "<td>{$sum}</td>";

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>テーブル表示</title>
    <style>
        table {
            border: 1px solid #000;
            border-collapse: collapse;
            text-align: right;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 0 10px;
        }
    </style>
</head>

<body>
    <!-- ここにテーブル表示 -->
    <table>
        <thead>
            <tr>
                <?PHP echo $header; ?>
            </tr>
        </thead>
        <tbody>
            <?PHP echo $body_rows; ?>
        </tbody>
        <tfoot>
            <tr>
                <?PHP echo $footer; ?>
            </tr>
        </tfoot>
    </table>
</body>

</html>