<?php
/* Smarty version 4.3.2, created on 2024-04-21 23:41:13
  from 'C:\xampp\htdocs\mvc_app\Views\inquiry\confirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_662525896d81f6_94042404',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dadbf8711d63339dd7daa40c0f362a49794ffe20' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc_app\\Views\\inquiry\\confirm.tpl',
      1 => 1713710110,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_662525896d81f6_94042404 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="p-4 container-field form-orange">
        <div class="row justify-content-center">
            <div class="col-lg-6 mx-auto col-md-8">
                <h2 class="mb-4">確認画面</h2>
                <form action="/inquiry/complete" method="post" class="bg-white p-3 rounded mb-5">

                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" name="name" maxlength="10" readonly
                            value=<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
>
                    </div>

                    <div class="form-group">
                        <label for="kana">フリガナ</label>
                        <input type="text" class="form-control" name="kana" maxlength="10" readonly
                            value=<?php echo $_smarty_tpl->tpl_vars['data']->value['kana'];?>
>
                    </div>

                    <div class="phone">
                        <label for="tel">電話番号</label>
                        <input type="tel" class="form-control" name="tel" readonly
                            value=<?php echo $_smarty_tpl->tpl_vars['data']->value['tel'];?>
>
                    </div>

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" name="email" readonly
                            value=<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
>

                    </div>

                    <div class="form-group">
                        <label for="body">お問い合わせ内容</label><br>
                        <textarea cols="58" rows="8" name="body" readonly><?php echo $_smarty_tpl->tpl_vars['data']->value['body'];?>
</textarea>
                    </div>

                    <div>
                        上記の内容でよろしいですか？
                    </div>

                    <div class="button-group">
                        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['token'];?>
">
                        <button type="submit" class="btn bg-warning my-2">送信</button>
                        <button type="button" class="btn bg-warning my-2" onclick="history.back(-1)">キャンセル</button>
                    </div>
                    
                </form>
            </div>
        </div>
        <div>
            <div class="row justify-content-md-center text-center">
                <div class="m-1">
                    <a href="/">トップページへ</a>
                </div>
            </div>
        </div>
    </div>

</body><?php }
}
