<?php
session_start();
require_once "./common/db_connect.php";
if (isset($_REQUEST['mail']) && isset($_REQUEST['pass'])) {
    $mail = $_REQUEST['mail'];
    $pass = $_REQUEST['pass'];
} else {
    $_SESSION['eMsg'] = 'メールアドレスとパスワードを入力してください。';
    header('Location: ./login.php');
    exit();
}

    $sql = "SELECT COUNT(*) AS cnt 
            FROM Customers
            WHERE CustomersEmail = ?
            AND CustomersPass = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($mail, $pass));
    $row = $stmt->FETCH(PDO::FETCH_ASSOC);

if (($row["cnt"] = 0)) {
    //同じ商品番号がある場合、リダイレクトしてエラーメッセージを飛ばす
    $_SESSION['eMsg'] = 'ログインに失敗しました。';
    header('Location: ./login.php');
    exit();
} else {
    $sql = "SELECT CustomersCode,CustomersName
            FROM Customers
            WHERE CustomersEmail = ?
            AND CustomersPass = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($mail, $pass));
    $rec = $stmt->FETCH(PDO::FETCH_ASSOC);
    $_SESSION['cCode'] = $rec['CustomersCode'];
    $_SESSION['cName'] = $rec['CustomersName'];
    header('Location: ./check_cart_login.php');
    exit();
}
