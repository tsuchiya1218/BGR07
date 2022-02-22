<?php
//02/22編集中
session_start();
require_once './common/db_connect.php';
//チェック用変数
$ErrorCheck = true;
//名前
if (!empty($_REQUEST['zip'])) {
    $zip = $_REQUEST['zip'];
} else {
    $_SESSION['eMsg']['zip'] = '郵便番号を入力してください。';
    $ErrorCheck = false;
}
//住所
if (!empty($_REQUEST['address1'])) {
    $address1 = $_REQUEST['address1'];
} else {
    $_SESSION['eMsg']['address1'] = '>都道府県・市区町村名を入力してください。';
    $ErrorCheck = false;
}
//
if (!empty($_REQUEST['address2'])) {
    $address1 = $_REQUEST['address2'];
} else {
    $_SESSION['eMsg']['address2'] = '>町名・番地以下・建物名を入力してください。';
    $ErrorCheck = false;
    }
}
//メールアドレス
if (!empty($_REQUEST['email'])) {
    if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/", $_REQUEST['email'])) {
        $email = $_REQUEST['email'];
        $sql = "SELECT COUNT(*) AS cnt FROM Customer WHERE EMail = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($email));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (($row["cnt"] > 0)) {
            $_SESSION['eMsg']['email'] = '登録されていないメールアドレスを入力してください。';
        }
    } else {
        $_SESSION['eMsg']['email'] = 'メールアドレスが正しくありません。';
        $ErrorCheck = false;
    }
} else {
    $_SESSION['eMsg']['email'] = 'メールアドレスを入力してください。';
    $ErrorCheck = false;
}
//パスワード
if (!empty($_REQUEST['pass'])) {
    if(preg_match("/^[a-zA-Z0-9]{6,30}$/",$_REQUEST['pass'])){
        $pass = $_REQUEST['pass'];
    }else{
        $_SESSION['eMsg']['pass'] = 'パスワードは英数字6文字以上30字以内で入力してください';
        $ErrorCheck = false;
    }
} else {
    $_SESSION['eMsg']['pass'] = 'パスワードを入力してください';
    $ErrorCheck = false;
}
//パスワード（確認用）
if (!empty($_REQUEST['pass2'])) {
    $pass2 = $_REQUEST['pass2'];
    //パスワード照合
    if ($_REQUEST['pass'] != ($_REQUEST['pass2'])) {
        $_SESSION['eMsg']['pass'] = 'パスワード(確認用)と一致しません入力し直してください。';
        $ErrorCheck = false;
    }
} else {
    $_SESSION['eMsg']['pass2'] = 'パスワード（確認用）を入力してください';
    $ErrorCheck = false;
}

if ($ErrorCheck == false) {
    header('Location: ./change_address.php');
    exit();
} else if ($ErrorCheck == true) {
    $_SESSION['changeAddress'] = [
        'zip' => $zip,
        'address1' => $address1,
        'address2' => $address2,
    ];
    header('Location: confirm_customer.php');
    exit();
}
