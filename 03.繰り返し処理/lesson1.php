<?php
// 配列に「日本,アメリカ,イギリス,フランス」を格納し、foreach文を使って順番に下記のフォーマットで出力して下さい。
// 要素番号:国名

$country = [
    'Japan' => '日本',
    'USA' => 'アメリカ',
    'UK' => 'イギリス',
    'France' => 'フランス',
];

foreach ($country as $value) {
    echo $value;
    echo "<br/>";
}