<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
require_once "./common/db_connect.php";
$sql = "SELECT COUNT(*) as cnt
        FROM Customers";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rec = $stmt->FETCH(PDO::FETCH_ASSOC);
$custcode = $rec['cnt'] + 1;

$sql = "INSERT INTO Customers
        (CustomersCode, CustomersName, CustomersZip, CustomersAddress1, CustomersAddress2, CustomersPhone, CustomersEmail, CustomersPass)
        VALUES(?,?,?,?,?,?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
        $custcode,
        $_SESSION['confirm']['name'], $_SESSION['confirm']['zipcode'],
        $_SESSION['confirm']['address1'], $_SESSION['confirm']['address2'],
        $_SESSION['confirm']['tel'], $_SESSION['confirm']['email'], $_SESSION['confirm']['pass']
));
?>
<h1 align="center">登録完了</h1>
<br />
<h3 align="center">登録完了しました。ホームページに戻ってログインしてください。</h3>
<?php
require "./common/footer.php";
?>