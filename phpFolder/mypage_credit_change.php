<?php
//02/22編集中
session_start();
require_once './common/db_connect.php';
//チェック用変数
$errorCheck = true;
if (!empty($_POST['creditnum'])) {
    if (preg_match('/^([0-9]{16})$/', $_POST['creditnum'])) {
        $creditnum = $_POST['creditnum'];
    } else {
        $_SESSION['eMsg']['creditnum'] = '番号は数字のみ、16桁で入力してください';
        $errorCheck = false;
    }
} else {
    $_SESSION['eMsg']['creditnum'] = '番号を入力してください';
    $errorCheck = false;
}
//有効期限
if (!empty($_POST['creditgoodthru'])) {
    if (preg_match('/^([0-9]{6})$/', $_POST['creditgoodthru'])) {
        $creditgoodthru = $_POST['creditgoodthru'];
    } else {
        $_SESSION['eMsg']['creditgoodthru'] = '番号は数字のみ、6桁で入力してください';
        $errorCheck = false;
    }
} else {
    $_SESSION['eMsg']['creditgoodthru'] = '番号を入力してください';
    $errorCheck = false;
}
//カード名義人
if (!empty($_POST['creditholder'])) {
    $creditholder = $_POST['creditholder'];
} else {
    $_SESSION['eMsg']['creditholder'] = 'カード名義人を入力してください。';
    $errorCheck = false;
}
//カード会社
if (!empty($_POST['creditcomp'])) {
    $creditcomp = $_POST['creditcomp'];
} else {
    $_SESSION['eMsg']['creditcomp'] = 'カード会社を入力してください。';
    $errorCheck = false;
}

if ($errorCheck == false) {
    header('Location: ./mypage_credit_change_popup.php');
    exit();
} else if ($errorCheck == true) {
    $sql = "UPDATE Customers 
            SET CustomersCardnumber = ?,CustomersGoodThru = ?, CardCompanyCode = ?, CustomersCardholder =  ?
            WHERE CustomersCode = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($creditnum, $creditgoodthru, 500001, $creditholder, $_SESSION['cCode']));
    header('Location: ./mypage_credit.php');
    exit();
}
