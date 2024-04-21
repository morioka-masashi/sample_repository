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
        <div class="justify-content-center">
            <div class="col-lg-6 mx-auto col-md-8">
                <h2 class="mb-4">入力画面</h2>
                <form action="/inquiry/confirm" method="post" id="inform_submit">

                    <div class="form-group">
                        <label for="name">氏名</label>
                        <input type="text" class="form-control" name="name" placeholder="テスト次郎" id="name">
                        <div class="errorMessage" id="nameErrorMessage" style="color: red;"></div>
                    </div>

                    <div class="form-group">
                        <label for="kana">フリガナ</label>
                        <input type="text" class="form-control" name="kana" placeholder="テストジロウ" id="kana">
                        <div class="errorMessage" id="kanaErrorMessage" style="color: red;"></div>
                    </div>

                    <div class="form-group">
                        <label for="tel">電話番号</label>
                        <input type="tel" class="form-control" name="tel" placeholder="ハイフンを入れずに入力してください" id="tel"
                            maxlength="11">
                        <div class="errorMessage" id="telErrorMessage" style="color: red;"></div>
                    </div>

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" name="email" placeholder="xxxxxx@xxx.xxx" id="email">
                        <div class="errorMessage" id="emailErrorMessage" style="color: red;"></div>
                    </div>

                    <div class="form-group">
                        <label for="body">お問い合わせ内容</label><br>
                        <textarea cols="58" rows="8" name="body" id="body"></textarea>
                        <div class="errorMessage" id="bodyErrorMessage" style="color: red;"></div>
                    </div>
                    <input type="hidden" name="token" value="{$token}">
                    <button type='submit' class="btn bg-warning my-2" id="submit">送信</button>
                </form>

            </div>
            <form action="/inquiry/edit" method="post">
                <div class="text-center">
                    <table class="table table-bordered border-dark">
                        <tr>
                            <th class="table-dark border-dark">氏名</th>
                            <th class="table-dark border-dark">フリガナ</th>
                            <th class="table-dark border-dark">電話番号</th>
                            <th class="table-dark border-dark">メールアドレス</th>
                            <th class="table-dark border-dark">お問い合わせ内容</th>
                            <!-- IDを含める -->
                            <th class="table-dark border-dark">編集</th>
                            <th class="table-dark border-dark">削除</th>
                        </tr>
                        {foreach from=$data item=row}
                            <tr class="table-secondary">
                                <td class=border-dark>{$row.name}</td>
                                <td class=border-dark>{$row.kana}</td>
                                <td class=border-dark>{$row.tel}</td>
                                <td class=border-dark>{$row.email}</td>
                                <td class=border-dark>{$row.body}</td>
                                <!-- IDを隠しフィールドとしてフォームに追加 -->
                                <td class=border-dark>
                                    <form action="/inquiry/edit" method="post">
                                        <input type="hidden" name="token" value="{$token}">
                                        <input type="hidden" name="id" value="{htmlspecialchars($row.id)}">
                                        <button type="submit" name="edit" value="{htmlspecialchars($row.id)}">編集</button>
                                    </form>
                                </td>
                                <td class=border-dark>
                                    <form id="deleteForm" action="/inquiry/delete" method="post">
                                        <input type="hidden" name="token" value="{$token}">
                                        <input id="idInput" type="hidden" name="id" value="">
                                        <button type="button"
                                            onclick="delete_button({htmlspecialchars($row['id'])})">削除</button>
                                    </form>
                                </td>
                            </tr>
                        {/foreach}
                    </table>
                </div>
            </form>
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

            function delete_button(id) {
                if (confirm("本当に削除してもよろしいですか？")) {
                    // OKがクリックされた場合、対応するIDを設定してフォームを送信する
                    document.getElementById('idInput').value = id;
                    document.getElementById('deleteForm').submit();
                }
            }
        {/literal}
    </script>

</body>