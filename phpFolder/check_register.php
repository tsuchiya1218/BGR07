<?php
session_start();
require_once "./common/db_connect.php";
//チェック用変数
$errorCheck = true;
//名前
if (!empty($_REQUEST['name'])) {
    $name = $_REQUEST['name'];
    $_SESSION['val']['name'] = htmlspecialchars($_POST['name']);
} else {
    $_SESSION['eMsg']['name'] = 'お名前を入力してください。';
    $_SESSION['val']['name'] = htmlspecialchars($_POST['name']);
    $errorCheck = false;
}
//郵便番号
if (!empty($_REQUEST['zipcode'])) {
    $zipcode = $_REQUEST['zipcode'];
    $_SESSION['val']['zipcode'] = htmlspecialchars($_POST['zipcode']);
} else {
    $_SESSION['eMsg']['zipcode'] = '郵便番号を入力してください。';
    $_SESSION['val']['zipcode'] = htmlspecialchars($_POST['zipcode']);
    $errorCheck = false;
}
//住所1
if (!empty($_REQUEST['address1'])) {
    $address1 = $_REQUEST['address1'];
    $_SESSION['val']['address1'] = htmlspecialchars($_POST['address1']);
} else {
    $_SESSION['eMsg']['address1'] = '住所を入力してください。';
    $_SESSION['val']['address1'] = htmlspecialchars($_POST['address1']);
    $errorCheck = false;
}
$address2 = $_REQUEST['address2'];
$_SESSION['val']['address2'] = htmlspecialchars($_POST['address2']);

//
if (!empty($_REQUEST['tel'])) {
    if (preg_match("/^0[0-9]{1,4}-[0-9]{1,4}-[0-9]{3,4}\z/", $_REQUEST['tel'])) {
        // 文字列が電話番号（ハイフンあり）である場合
        $tel = $_REQUEST['tel'];
        $_SESSION['val']['tel'] = htmlspecialchars($_POST['tel']);
    } else {
        // 文字列が電話番号（ハイフンあり）でない場合
        $_SESSION['eMsg']['tel'] = '電話番号が正しくありません。';
        $_SESSION['val']['tel'] = htmlspecialchars($_POST['tel']);
        $errorCheck = false;
    }
}
//メールアドレス
if (!empty($_REQUEST['email'])) {
    if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/", $_REQUEST['email'])) {
        $email = $_REQUEST['email'];
        $_SESSION['val']['email'] = htmlspecialchars($_POST['email']);
        $sql = "SELECT COUNT(*) AS cnt FROM Customers WHERE CustomersEmail = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($email));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (($row["cnt"] > 0)) {
            $_SESSION['eMsg']['email'] = '登録されていないメールアドレスを入力してください。';
            $_SESSION['val']['email'] = htmlspecialchars($_POST['email']);
            $errorCheck = false;
        }
    } else {
        $_SESSION['eMsg']['email'] = 'メールアドレスが正しくありません。';
        $_SESSION['val']['email'] = htmlspecialchars($_POST['email']);
        $errorCheck = false;
    }
} else {
    $_SESSION['eMsg']['email'] = 'メールアドレスを入力してください。';
    $_SESSION['val']['email'] = htmlspecialchars($_POST['email']);
    $errorCheck = false;
}
//パスワード
if (!empty($_REQUEST['pass'])) {
    if (preg_match("/^[a-zA-Z0-9]{6,30}$/", $_REQUEST['pass'])) {
        $pass = $_REQUEST['pass'];
    } else {
        $_SESSION['eMsg']['pass'] = 'パスワードは英数字6文字以上30字以内で入力してください';
        $errorCheck = false;
    }
} else {
    $_SESSION['eMsg']['pass'] = 'パスワードを入力してください';
    $errorCheck = false;
}
//パスワード（確認用）
if (!empty($_REQUEST['pass2'])) {
    $pass2 = $_REQUEST['pass2'];
    //パスワード照合
    if ($_REQUEST['pass'] != ($_REQUEST['pass2'])) {
        $_SESSION['eMsg']['pass'] = 'パスワード(確認用)と一致しません入力し直してください。';
        $errorCheck = false;
    }
} else {
    $_SESSION['eMsg']['pass2'] = 'パスワード（確認用）を入力してください';
    $errorCheck = false;
}

if ($errorCheck == false) {
    header('Location: register_customer.php');
    exit();
} else if ($errorCheck == true) {

    $_SESSION['confirm'] = [
        'name' => $name,
        'zipcode' => $zipcode,
        'address1' => $address1,
        'address2' => $address2,
        'tel' => $tel,
        'email' => $email,
        'pass' => $pass
    ];

    header('Location: confirm_customer.php');
    exit();
}
