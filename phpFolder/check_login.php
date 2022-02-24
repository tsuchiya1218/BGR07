<?php
session_start();
require_once "./common/db_connect.php";

if (empty($_POST['mail']) || empty($_POST['pass'])) {
    $_SESSION['eMsg'] = 'メールアドレスとパスワードを入力してください。';
    header('Location: ./login.php');
    exit();

} else{
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
}
/*
if (isset($_SESSION['motourl'])) {
    $motourl = $_SESSION['motourl'];
    unset($_SESSION['motourl']);
}
*/

$sql = "SELECT COUNT(*) AS cnt 
        FROM Customers
        WHERE CustomersEmail = ?
        AND CustomersPass = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($mail, $pass));
$row = $stmt->FETCH(PDO::FETCH_ASSOC);

if (($row["cnt"] == 0)) {
    $_SESSION['eMsg'] = '登録されていないメールアドレス、もしくは無効なパスワードです。';
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

    if (isset($rec['CustomersCode']) && isset($rec['CustomersName'])) {
        $_SESSION['cCode'] = $rec['CustomersCode'];
        $_SESSION['cName'] = $rec['CustomersName'];
    }
    if (isset($_SESSION['motourl'])) {
        header("Location: $_SESSION[motourl]");
        exit();
    } else {
        header("Location: ./index.php");
    }
}
