﻿<?php
// 80点以上なら「優」
// 60点以上なら「良」
// 40点以上なら「可」
// それ以下なら「不可」

// という形で区別し、下記のフォーマットで出力するプログラムを作ってください。
// ○○点は「○」です。

$score = 100; //いくつかのケースで動作確認を行ってください。

// $score = 80;
// $score = 60;
// $score = 40;
// $score = 39;

// $score = 79;
// $score = 61;
// $score = 59;
// $score = 41;


if($score >= 80){
        echo $score.'点は「優」です';
    }elseif ($score >= 60) {
        echo $score.'点は「良」です';
    }elseif ($score >= 40) {
        echo $score.'点は「可」です';
    }  else{
    echo $score.'点は「不可」です';
}