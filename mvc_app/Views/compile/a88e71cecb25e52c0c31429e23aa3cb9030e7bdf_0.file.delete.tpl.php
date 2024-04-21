<?php
/* Smarty version 4.3.2, created on 2024-04-17 23:08:32
  from 'C:\xampp\htdocs\mvc_app\Views\inquiry\delete.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_661fd7e0dad788_43071331',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a88e71cecb25e52c0c31429e23aa3cb9030e7bdf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mvc_app\\Views\\inquiry\\delete.tpl',
      1 => 1713362885,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661fd7e0dad788_43071331 (Smarty_Internal_Template $_smarty_tpl) {
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
                <h2 class="mb-4">削除画面</h2>
                <form action="/inquiry/delete" method="post" class="bg-white p-3 rounded mb-5">

                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['id'];?>
">

                    <div class="form-group">
                        <label for="name">氏名</label>
                        <input type="text" class="form-control" name="name" maxlength="10" readonly
                            value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['name'];?>
">
                    </div>

                    <div class="form-group">
                        <label for="kana">フリガナ</label>
                        <input type="text" class="form-control" name="kana" maxlength="10" readonly
                            value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['kana'];?>
">
                    </div>

                    <div class="phone">
                        <label for="tel">電話番号</label>
                        <input type="tel" class="form-control" name="tel" readonly value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['tel'];?>
">
                    </div>

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" name="email" readonly value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['email'];?>
">
                    </div>

                    <div class="form-group">
                        <label for="body">お問い合わせ内容</label><br>
                        <textarea cols="58" rows="8" name="body" readonly><?php echo $_smarty_tpl->tpl_vars['contact']->value['body'];?>
</textarea>
                    </div>

                    <div class="edit-button">
                        <button type="button" class="btn bg-warning my-2"
                            onclick="confirmDelete()">削除してよろしいですか？</button>
                        <button type="button" class="btn bg-warning my-2" onclick="history.back(-1)">キャンセル</button>
                    </div>
                    
                </form>
            </div>
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

    <?php echo '<script'; ?>
>
        function confirmDelete() {
            if (confirm("本当に削除してもよろしいですか？")) {
                // OKがクリックされた場合、フォームを送信する
                document.getElementById('deleteForm').submit();
            }
        }
    <?php echo '</script'; ?>
>

</body><?php }
}
