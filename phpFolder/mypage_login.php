<?php
session_start();
require_once "./common/db_connect.php";
$cCode = $_SESSION['cCode'];
?>
<?php
$sql = "SELECT Customers.CustomersCardnumber, Customers.CustomersGoodThru, Customers.CustomersCardholder, CardCompany.CardCompanyName
FROM CardCompany
INNER JOIN Customers
ON Customers.CardCompanyCode = CardCompany.CcCode
WHERE Customers.CustomersCode = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($cCode));
$rec = $stmt->FETCH(PDO::FETCH_ASSOC);
?>
<script src="./js/popup.js"></script>
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="./css/popup.css">
<div class="popup" id="js-popup">
    <div class="popup-inner">
        <h3><?= $_SESSION["cName"] ?>様のカード登録情報</h3>
        <button type="button" onClick="history.back()">戻る</button>
        <button type=“button” onclick="location.href='./mypage_credit_change.php'">カード情報変更</button>
    </div>
    <div class="black-background" id="js-black-bg"></div>
</div>