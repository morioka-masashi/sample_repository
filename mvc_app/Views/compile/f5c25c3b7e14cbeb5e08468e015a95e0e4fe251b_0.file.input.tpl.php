<?php
/* Smarty version 4.3.2, created on 2024-04-10 16:37:13
  from 'C:\xampp\htdocs\mvc_app\Views\user\input.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_661641a99739c2_44112562',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5c25c3b7e14cbeb5e08468e015a95e0e4fe251b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc_app\\Views\\user\\input.tpl',
      1 => 1712734630,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661641a99739c2_44112562 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="p-4 container-field form-orange">
    <div class="row justify-content-center">
        <div class="col-lg-6 mx-auto col-md-8">
            <h2 class="mb-4">入力画面</h2>
            <form action="#" method="post" class="bg-white p-3 rounded mb-5">
                

                <div class="form-group">
                    <label for="inquiry_name">氏名</label>
                    <input type="text" class="form-control" name="inquiry_name" maxlength="10" placeholder="テスト次郎">
                    
                </div>

                <div class="form-group">
                    <label for="inquiry_furigana">フリガナ</label>
                    <input type="text" class="form-control" name="inquiry_furigana" maxlength="10" placeholder="テストジロウ">
                    
                </div>

                <div class="inquiry_phone">
                    <label for="inquiry_phone">電話番号</label>
                    <input type="tel" class="form-control" name="inquiry_phone" placeholder="xxx-xxxx-xxxx">
                    
                </div>

                <div class="form-group">
                    <label for="inquiry_email">メールアドレス</label>
                    <input type="email" class="form-control" name="inquiry_email" placeholder="xxxxxx@xxx.xxx">
                    
                </div>

                <div class="form-group">
                    <label for="message">お問い合わせ内容</label><br>
                    <textarea cols="58" rows="8" name="message"></textarea>
                    
                </div>

                <div class="button-group">
                    <button class="btn bg-warning my-2">送信</button>
                </div>
            </form>
        </div>
    </div>
    <div>
        <div class="row justify-content-md-center text-center">
            <div class="col-lg-6 mx-auto col-md-8">
                <div class="bg-white p-3 rounded mb-5">
                    <div class="m-1">
                        <a href="/user/sign-up">登録がお済みでない方</a>
                    </div>
                    <div class="m-1">
                        <a href="#">パスワードをお忘れの方</a>
                    </div>
                    <div class="m-1">
                        <a href="/">トップページへ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body><?php }
}
