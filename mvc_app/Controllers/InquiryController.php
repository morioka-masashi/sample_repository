<?php
require_once ROOT_PATH . 'Controllers/Controller.php';
require_once ROOT_PATH . 'Models/inquiry.php';
class InquiryController extends Controller
{
    public function CSRF()
    {
        // CSRF トークンを生成
        $token = bin2hex(random_bytes(32));

        // 生成した CSRF トークンをセッションに保存
        $_SESSION['token'] = $token;

        // セッションを保存
        session_write_close();

        return $token;
    }

    public function input()
    {
        // $_SESSIONと$_POSTの値を空にする
        $_SESSION = [];
        $_POST = [];

        // CSRFトークンを生成し、セッションに保存
        $token = $this->CSRF();

        // モデルをインスタンス化
        $model = new Inquiry();

        // 全ての連絡先情報を取得
        $data = $model->getAllContacts();

        // ビューにデータとCSRFトークンを渡す
        $this->view('inquiry/input', ['data' => $data, 'token' => $token]);
    }

    public function confirm(array $data = [])
    {
        // フォームの送信があった場合のみ処理を行う
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $errorMessages = [];

            if (empty($_POST['name'])) {
                $errorMessages['name'] = '氏名は必須入力です。';

            } elseif (mb_strlen($_POST['name']) > 10) {
                $errorMessages['name'] = '氏名は10文字以内です。';

            }

            if (empty($_POST['kana'])) {
                $errorMessages['kana'] = 'フリガナは必須入力です';

            } elseif (mb_strlen($_POST['kana']) > 10) {
                $errorMessages['kana'] = 'フリガナは10文字以内です。';

            }

            if (empty($_POST['tel'])) {
                $errorMessages['tel'] = '電話番号は必須入力です';

            } elseif (!preg_match("/^0[5789]0\d{4}\d{4}$/", $_POST['tel'])) {
                $errorMessages['tel'] = '電話番号は数字入力です。';

            }

            if (empty($_POST['email'])) {
                $errorMessages['email'] = 'メールアドレスは必須入力です。';

            } elseif (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $_POST['email'])) {
                $errorMessages['email'] = 'メールアドレスには「@」を含む形式で入力してください。';

            }

            if (empty($_POST['body'])) {
                $errorMessages['body'] = 'お問い合わせ内容は必須入力です。';

            }

            if (!empty($errorMessages)) {
                // バリデーション失敗
                header('Location: /');
                exit();
            }
            // 直前の入力内容をセッションに保存
            $data = [
                'name'  => htmlspecialchars($_POST['name']),
                'kana'  => htmlspecialchars($_POST['kana']),
                'tel'   => htmlspecialchars($_POST['tel']),
                'email' => htmlspecialchars($_POST['email']),
                'body'  => htmlspecialchars($_POST['body']),
                'token' => htmlspecialchars($_POST['token']),
            ];
            // ビューにデータを渡す
            $this->view('inquiry/confirm', ['data' => $data]);
        } else {
            // POST以外のリクエストの場合は不正なアクセスとして扱う
            header("Location: /inquiry/input");
            exit;
        }
    }

    public function complete()
    {
        // POST リクエストの場合のみ処理を行う
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // CSRFトークンのチェック
            if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
                // CSRFトークンが一致しない場合は不正なアクセスとして処理
                header('Location: /');
                exit();
            }

            // POST データを取得
            $name  = htmlspecialchars($_POST['name']);
            $kana  = htmlspecialchars($_POST['kana']);
            $tel   = htmlspecialchars($_POST['tel']);
            $email = htmlspecialchars($_POST['email']);
            $body  = htmlspecialchars($_POST['body']);
            $token = htmlspecialchars($_POST['token']);


            $model = new Inquiry();
            $model->create($name, $kana, $tel, $email, $body);

            // $_POST の値を初期化する
            $_SESSION = [];
            $_POST = [];


            $this->view('inquiry/complete');
        } else {
            // POST 以外のリクエストの場合は不正なアクセスとして扱う
            header('Location: /');
            exit();
        }
    }

    public function edit()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // クエリパラメータからIDを取得
            if (!isset($_POST['id'])) {
                // エラーメッセージを表示して処理を終了するか、適切な処理を実行してください。
                echo "IDが指定されていません。";
                return;
            }

            // IDを取得
            $id = $_POST['id'];
            $token = $_POST['token'];

            $_SESSION['token'] = htmlspecialchars($token);

            // モデルをインスタンス化
            $model = new Inquiry();

            // モデルのメソッドを呼び出して特定のレコードを取得
            $contact = $model->getPointContact($id);

            // $contact が null の場合の処理を追加
            if ($contact === null) {
                // エラーメッセージを表示して処理を終了するか、適切な処理を実行してください。
                echo "該当するレコードが見つかりませんでした。";
                return;
            }

            // 取得したレコードをビューに渡す
            $this->view('inquiry/edit', ['contact' => $contact, 'token' => $_SESSION]);
        } else {
            // POST以外のリクエストの場合は不正なアクセスとして扱う
            header("Location: /inquiry/input");
            exit;
        }

    }

    public function update()
    {
        $errorMessages = [];

        if (empty($_POST['name'])) {
            $errorMessages['name'] = '氏名は必須入力です。';

        } elseif (mb_strlen($_POST['name']) > 10) {
            $errorMessages['name'] = '氏名は10文字以内です。';
        }

        if (empty($_POST['kana'])) {
            $errorMessages['kana'] = 'フリガナは必須入力です';

        } elseif (mb_strlen($_POST['kana']) > 10) {
            $errorMessages['kana'] = 'フリガナは10文字以内です。';

        }

        if (empty($_POST['tel'])) {
            $errorMessages['tel'] = '電話番号は必須入力です';

        } elseif (!preg_match("/^0[5789]0\d{4}\d{4}$/", $_POST['tel'])) {
            $errorMessages['tel'] = '電話番号は数字入力です。';

        }

        if (empty($_POST['email'])) {
            $errorMessages['email'] = 'メールアドレスは必須入力です。';

        } elseif (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $_POST['email'])) {
            $errorMessages['email'] = 'メールアドレスには「@」を含む形式で入力してください。';

        }

        if (empty($_POST['body'])) {
            $errorMessages['body'] = 'お問い合わせ内容は必須入力です。';
        }

        if (!empty($errorMessages)) {
            // バリデーション失敗
            header('Location: /');
            exit();
        }
        // CSRF トークンの検証
        if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
            // CSRFトークンが一致しない場合は不正なアクセスとして処理
            header('Location: /');
            exit();
        }

        // フォームデータの受け取り
        $id    = htmlspecialchars($_POST['id']); // id を受け取る
        $name  = htmlspecialchars($_POST['name']);
        $kana  = htmlspecialchars($_POST['kana']);
        $tel   = htmlspecialchars($_POST['tel']);
        $email = htmlspecialchars($_POST['email']);
        $body  = htmlspecialchars($_POST['body']);
        $token = htmlspecialchars($_POST['token']);

        // モデルの呼び出しとデータベースへの保存または更新
        $model = new Inquiry();
        $success = $model->save($id, $name, $kana, $tel, $email, $body);

        $_SESSION = [];
        $_POST = [];
        // 保存または更新の結果に応じて処理
        if ($success) {
            // 成功した場合の処理（例：成功メッセージを表示）
            echo "データが正常に保存されました。";
        } else {
            // 失敗した場合の処理（例：エラーメッセージを表示）
            echo "データの保存中に問題が発生しました。";
        }

        // リダイレクト
        header("Location: /inquiry/input");
        exit;
    }

    public function delete()
    {
        // CSRF トークンの検証
        if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
            // CSRFトークンが一致しない場合は不正なアクセスとして処理
            header('Location: /');
            exit();
        }

        // フォームデータの受け取り
        if (!isset($_POST['id'])) {
            echo "IDが指定されていません。";
            return;
        }

        // IDを取得
        $id = $_POST['id'];
        $model = new Inquiry();

        // モデルのメソッドを呼び出して特定のレコードを取得
        $contact = $model->getPointContact($id);

        // $contact が null の場合の処理を追加
        if ($contact === null) {
            // エラーメッセージを表示して処理を終了するか、適切な処理を実行してください。
            echo "該当するレコードが見つかりませんでした。";
            return;
        }

        // モデルの呼び出しとデータベースからの削除
        $success = $model->remove($id);

        $_SESSION = [];
        $_POST = [];

        if ($success) {
            header("Location: /inquiry/input");
        } else {
            echo "データの削除中に問題が発生しました。";
        }
    }
}

