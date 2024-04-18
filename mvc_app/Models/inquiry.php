<?php
require_once (ROOT_PATH . 'Models/Db.php');

class Inquiry extends Db
{
    private $_value;
    public function setValue($i)
    {
        // 引数の値をプロパティに保存する
        $this->_value = $i;
    }

    public function __construct($dbh = null)
    {
        parent::__construct($dbh);
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // mysqlからデータ(表)の取得
    public function getAllContacts()
    {
        try {
            // SQL文を準備
            $sql = "SELECT * FROM contacts";
            // プリペアドステートメントを準備
            $stmt = $this->dbh->prepare($sql);

            // ステートメントを実行
            $stmt->execute();

            // 結果を配列で取得
            $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $contacts;
        } catch (PDOException $e) {
            // エラーハンドリング
            return [];
        }
    }
    //入力されたデータをデータベースに登録
    public function create(string $name, string $kana, string $tel, string $email, string $body)
    {
        try {

            $this->dbh->beginTransaction();

            $query = 'INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name, :kana, :tel, :email, :body)';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
            $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':body', $body, PDO::PARAM_STR);
            $stmt->execute();
            $lastId = $this->dbh->lastInsertId();

            // トランザクションを完了することでデータの書き込みを確定させる
            $this->dbh->commit();

            return $lastId;

        } catch (PDOException $e) {
            // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
            $this->dbh->rollBack();
            echo "送信失敗: " . $e->getMessage() . "\n";
            exit();
        }
    }
    public function getPointContact($id)
    {
        try {
            // SQL文を準備
            $sql = "SELECT * FROM contacts WHERE id = :id";
            // プリペアドステートメントを準備
            $stmt = $this->dbh->prepare($sql);
            // パラメータをバインド
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            // ステートメントを実行
            $stmt->execute();

            // 結果を配列で取得
            $contact = $stmt->fetch(PDO::FETCH_ASSOC);

            return $contact;

        } catch (PDOException $e) {
            // エラーハンドリング
            return null;
        }
    }

    public function save($id, $name, $kana, $tel, $email, $body)
    {
        try {
            // SQL文を準備
            $sql = 'UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body WHERE id = :id';
            // プリペアドステートメントを準備
            $stmt = $this->dbh->prepare($sql);
            // パラメータをバインド
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
            $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':body', $body, PDO::PARAM_STR);
            // ステートメントを実行
            $stmt->execute();
            // 成功を返す
            return true;
        } catch (PDOException $e) {
            // エラーハンドリング
            // エラーログにエラーメッセージを記録したり、適切な方法でエラーを処理したりします。
            return false;
        }
    }
    public function remove($id)
    {
        try {
            // SQL文を準備
            $sql = 'DELETE FROM contacts WHERE id = :id';
            $stmt = $this->dbh->prepare($sql);
            // パラメータをバインド
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            // ステートメントを実行
            $stmt->execute();
            // 成功を返す
            return true;
        } catch (PDOException $e) {
            // エラーハンドリング
            // エラーログにエラーメッセージを記録したり、適切な方法でエラーを処理したりします。
            return false;
        }
    }



}