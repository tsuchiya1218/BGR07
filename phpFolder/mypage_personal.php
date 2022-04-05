<?php
session_start();
require_once "./common/db_connect.php";
$cCode = $_SESSION['cCode'];
?>
<?php
$sql = "SELECT CustomersPhone, CustomersBirthday, CustomersGender
        FROM Customers
        WHERE CustomersCode = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($cCode));
$rec = $stmt->FETCH(PDO::FETCH_ASSOC);
?>
<script src="./js/popup.js"></script>
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="./css/popup.css">
<div class="popup" id="js-popup">
    <div class="popup-inner">
        <h3><?= $_SESSION["cName"] ?>様の個人登録情報</h3>
        <p>電話番号：<?= $rec["CustomersPhone"] ?></p>
        <p>誕生日：<?= $rec["CustomersBirthday"] ?></p>
        <p>性別:<?php if($rec["CustomersGender"] == 1){
            echo "男";
            }else if($rec["CustomersGender"] == 2){
                echo "女";
            }?></p>
        <button type="button" onClick="history.back()">戻る</button>
    </div>
    <div class="black-background" id="js-black-bg"></div>
</div>