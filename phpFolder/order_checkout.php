<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
?>
<script src="./js/order_confirm.js"></script>
<script src="./js/popup.js"></script>
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">



<link rel="stylesheet" href="./css/popup.css">
<div class="popup" id="js-popup">
  <div class="popup-inner">
        <p>支払い方法を選択してください</p>
        <form>
            <input type="radio" name="checkout">クレジットカード決済<br>
            <input type="radio" name="checkout">コンビニ支払い<br>
            </br>
            <button type="button" onClick="choice()">支払い情報入力</button>
        </form>
    <div class="close-btn" id="js-close-btn"><i class="fas fa-times"></i></div>
  </div>
  <div class="black-background" id="js-black-bg"></div>
</div>


<?php
require "./common/footer.php";
?>