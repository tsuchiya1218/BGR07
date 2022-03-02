<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
?>
<script src="./js/order_confirm.js"></script>

<p>支払い方法を選択してください</p>
<form action="order_comp.php" method="POST">
    <input type="radio" name="checkout">クレジットカード決済<br>
    <input type="radio" name="checkout">コンビニ支払い<br>
    <button type="button" onClick="choice()">決済</button>
</form>
<?php
require "./common/footer.php";
?>