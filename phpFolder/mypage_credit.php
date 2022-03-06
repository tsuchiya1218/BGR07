<?php
session_start();
require_once "./common/db_connect.php";
$cCode = $_SESSION['cCode'];
?>
<?php
$sql = "SELECT CustomersCardnumber,CustomersGoodThru,CustomersCardholder,CardCompany.CardCompanyName
        FROM Customers,CardCompany 
        WHERE Customers.CardCompanyCode = CardCompany.CcCode
        AND   Customers.CustomersCode = ?";
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
        <p>クレジットカード番号：<?= $rec["CustomersCardnumber"] ?></p>
        <p>クレジットカード有効期限：<?= $rec["CustomersGoodThru"] ?></p>
        <p>クレジットカード名義：<?= $rec["CustomersCardholder"] ?></p>
        <p>クレジットカードカード会社：<?= $rec["CardCompanyCode"] ?></p>
        <button type="button" onClick="history.back()">戻る</button>
        <button type=“button” onclick="location.href='./mypage_credit_change.php'">カード情報変更</button>
        <div class="close-btn" id="js-close-btn">
            <i class="fas fa-times"></i>
        </div>
    </div>
    <div class="black-background" id="js-black-bg"></div>
</div>