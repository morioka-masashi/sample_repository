<!DOCTYPE html>
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
                <h2 class="mb-4">更新画面</h2>
                <form action="/inquiry/update" method="post" class="bg-white p-3 rounded mb-5" id="inform_submit">

                    <input type="hidden" name="id" value="{$contact['id']}">

                    <div class="form-group">
                        <label for="name">氏名</label>
                        <input type="text" class="form-control" name="name" value="{$contact['name']}" id="name">
                        <div class="errorMessage" id="nameErrorMessage" style="color: red;"></div>
                    </div>

                    <div class="form-group">
                        <label for="kana">フリガナ</label>
                        <input type="text" class="form-control" name="kana" value="{$contact['kana']}" id="kana">
                        <div class="errorMessage" id="kanaErrorMessage" style="color: red;"></div>
                    </div>

                    <div class="form-group">
                        <label for="tel">電話番号</label>
                        <input type="tel" class="form-control" name="tel" value="{$contact['tel']}" id="tel"
                            maxlength="11">
                        <div class="errorMessage" id="telErrorMessage" style="color: red;"></div>
                    </div>

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" name="email" value="{$contact['email']}" id="email">
                        <div class="errorMessage" id="emailErrorMessage" style="color: red;"></div>
                    </div>

                    <div class="form-group">
                        <label for="body">お問い合わせ内容</label><br>
                        <textarea cols="58" rows="8" name="body" id="body">{$contact['body']}</textarea>
                        <div class="errorMessage" id="bodyErrorMessage" style="color: red;"></div>
                    </div>
                    {* <div class="form-group">
                        <label for="name">氏名</label>
                        <input type="text" class="form-control" name="name" value="{$contact['name']}">
                        <div class="errorMessage" id="nameErrorMessage" style="color: red;"></div>
                    </div>

                    <div class="form-group">
                        <label for="kana">フリガナ</label>
                        <input type="text" class="form-control" name="kana" value="{$contact['kana']}">
                        <div class="errorMessage" id="kanaErrorMessage" style="color: red;"></div>
                    </div>

                    <div class="form-group">
                        <label for="tel">電話番号</label>
                        <input type="tel" class="form-control" name="tel" value="{$contact['tel']}">
                        <div class="errorMessage" id="telErrorMessage" style="color: red;"></div>
                    </div>

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" name="email" value="{$contact['email']}">
                        <div class="errorMessage" id="emailErrorMessage" style="color: red;"></div>
                    </div>

                    <div class="form-group">
                        <label for="body">お問い合わせ内容</label><br>
                        <textarea cols="58" rows="8" name="body">{$contact['body']}</textarea>
                        <div class="errorMessage" id="bodyErrorMessage" style="color: red;"></div>
                    </div> *}

                    <div class="edit-button">
                        <input type="hidden" name="token" value="{$token['token']}">
                        <button type="submit" class="btn bg-warning my-2" id="submit">上記の変更でよろしいですか？</button>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        {literal}
            $("#inform_submit").on("submit", function(event) {
                let nameValue = $("#name").val();
                let kanaValue = $("#kana").val();
                let telValue = $("#tel").val();
                let emailValue = $("#email").val();
                let bodyValue = $("#body").val();

                // エラーメッセージの初期化
                $(".errorMessage").text("");

                // 各フィールドの検証
                if (!nameValue) {
                    $("#nameErrorMessage").text("氏名は必須入力です。");
                    event.preventDefault(); // フォームの送信を中止
                } else if (nameValue.length > 10) {
                    $("#nameErrorMessage").text("氏名は10文字以内です。");
                    event.preventDefault(); // フォームの送信を中止
                }

                if (!kanaValue) {
                    $("#kanaErrorMessage").text("フリガナは必須入力です");
                    event.preventDefault(); // フォームの送信を中止
                } else if (kanaValue.length > 10) {
                    $("#kanaErrorMessage").text("フリガナは10文字以内です。");
                    event.preventDefault(); // フォームの送信を中止
                }
                if (!telValue) {
                    $("#telErrorMessage").text("電話番号は必須入力です");
                    event.preventDefault(); // フォームの送信を中止
                    } else if (!/^(0[7-9]\d{9,11}|0[7-9]0\d{8}|050\d{8})$/.test(telValue)) {
                    $("#telErrorMessage").text("電話番号は数字入力です。");
                    event.preventDefault(); // フォームの送信を中止
                }
                if (!emailValue) {
                    $("#emailErrorMessage").text("メールアドレスは必須入力です。");
                    event.preventDefault(); // フォームの送信を中止
                    } else if (!/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b/.test(emailValue)) {
                    $("#emailErrorMessage").text("メールアドレスには「@」を含む形式で入力してください。");
                    event.preventDefault(); // フォームの送信を中止
                }
                if (!bodyValue) {
                    $("#bodyErrorMessage").text("お問い合わせ内容は必須入力です。");
                    event.preventDefault(); // フォームの送信を中止
                }
            });
        {/literal}
    </script>
</body>