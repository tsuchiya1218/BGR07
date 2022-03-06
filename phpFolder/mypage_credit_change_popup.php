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
        <form action="mypage_credit_change.php" method="post">
            <p>クレジットカード番号：<input type="text" size="30" name="creditnum" value="" placeholder="例:">
                <?php
                if (isset($_SESSION['eMsg']['creditnum'])) {
                    echo '<br><div class="message">' . $_SESSION['eMsg']['creditnum'] . '</div>';
                    unset($_SESSION['eMsg']['creditnum']);
                }
                ?></p>
            <p>クレジットカード有効期限：<input type="text" size="30" name="creditgoodthru" value="" placeholder="例:">
                <?php
                if (isset($_SESSION['eMsg']['creditgoodthru'])) {
                    echo '<br><div class="message">' . $_SESSION['eMsg']['creditgoodthru'] . '</div>';
                    unset($_SESSION['eMsg']['creditgoodthru']);
                }
                ?></p>
            <p>クレジットカード名義：<input type="text" size="30" name="creditholder" value="" placeholder="例:">
                <?php
                if (isset($_SESSION['eMsg']['creditholder'])) {
                    echo '<br><div class="message">' . $_SESSION['eMsg']['creditholder'] . '</div>';
                    unset($_SESSION['eMsg']['creditholder']);
                }
                ?></p>
            <p>クレジットカードカード会社： <input type="text" size="30" name="creditcomp" value="" placeholder="例:">
                <?php
                if (isset($_SESSION['eMsg']['creditcomp'])) {
                    echo '<br><div class="message">' . $_SESSION['eMsg']['creditcomp'] . '</div>';
                    unset($_SESSION['eMsg']['creditcomp']);
                }
                ?>
            </p>
            <button type="button" onClick="history.back()">戻る</button>
            <input type="submit" value="更新">
        </form>
    </div>
    <div class="black-background" id="js-black-bg"></div>
</div>

<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>