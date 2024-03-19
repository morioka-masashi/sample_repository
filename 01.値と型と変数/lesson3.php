<?php
// 連想配列のkey
// name, age, genderに
// 山田,  20,  女性
// という値を格納し、

// 山田
// 20歳・女性

// という形で出力してください。

$arr = ['name' => '山田','age' => '20','gender' => '女性'];

echo $arr['name'];
echo '<br>';
echo $arr['age'].'・'.$arr['gender'];