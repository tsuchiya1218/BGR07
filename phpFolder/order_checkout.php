<?php
require "./common/header.php";
require "./common/banner.php";
?>
<p>支払い方法を選択してください</p>
<form action="order_comp.php" method="POST">
    <input type="radio" name="checkout">クレジットカード決済<br>
    <input type="radio" name="checkout">コンビニ支払い<br>
    <input type="submit" value="決済">
</form>
<?php
require "./common/footer.php";
?>