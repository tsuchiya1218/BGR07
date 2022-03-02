<?php
//02/22編集中
session_start();
require_once './common/db_connect.php';
//チェック用変数
$errorCheck = true;
if (!empty($_POST['zip'])) {
    if (preg_match('/^([0-9]{7})$/', $_POST['zip'])) {
        $zip = $_POST['zip'];
    } else {
        $_SESSION['eMsg']['zip'] = '郵便番号は数字のみ、7桁で入力してください';
        $errorCheck = false;
    }
} else {
    $_SESSION['eMsg']['zip'] = '郵便番号を入力してください';
    $errorCheck = false;
}
//住所1
if (!empty($_POST['address1'])) {
    $address1 = $_POST['address1'];
} else {
    $_SESSION['eMsg']['address1'] = '都道府県・市区町村名を入力してください。';
    $errorCheck = false;
}
//住所2
if (!empty($_POST['address2'])) {
    $address2 = $_POST['address2'];
} else {
    $_SESSION['eMsg']['address2'] = '町名・番地以下・建物名を入力してください。';
    $errorCheck = false;
}

if ($errorCheck == false) {
    header('Location: ./change_address.php');
    exit();
} else if ($errorCheck == true) {
    $_SESSION['msg'] = '住所の変更が正常に完了しました。<br>
                        下記の戻るボタンから配送先の確認画面へお戻りください。';
    $sql = "UPDATE Customers 
            SET CustomersZip = ?,CustomersAddress1 = ?,CustomersAddress2 =  ?
            WHERE CustomersCode = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($zip,$address1,$address2,$_SESSION['cCode']));
    header('Location: ./change_address.php');
    exit();
}
