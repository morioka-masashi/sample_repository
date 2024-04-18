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
                <h2 class="mb-4">確認画面</h2>
                <form action="/inquiry/complete" method="post" class="bg-white p-3 rounded mb-5">

                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" name="name" maxlength="10" readonly
                            value={htmlspecialchars($data['name'])}>
                    </div>

                    <div class="form-group">
                        <label for="kana">フリガナ</label>
                        <input type="text" class="form-control" name="kana" maxlength="10" readonly
                            value={htmlspecialchars($data['kana'])}>
                    </div>

                    <div class="phone">
                        <label for="tel">電話番号</label>
                        <input type="tel" class="form-control" name="tel" readonly
                            value={htmlspecialchars($data['tel'])}>
                    </div>

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" class="form-control" name="email" readonly
                            value={htmlspecialchars($data['email'])}>

                    </div>

                    <div class="form-group">
                        <label for="body">お問い合わせ内容</label><br>
                        <textarea cols="58" rows="8" name="body" readonly>{htmlspecialchars($data['body'])}</textarea>
                    </div>

                    <div>
                        上記の内容でよろしいですか？
                    </div>


                    <div class="button-group">
                        <input type="hidden" name="token" value="{$data['token']}">
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

</body>