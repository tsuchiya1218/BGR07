<?php
session_start();
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
            <input type="button" value="戻る" onClick="document.location='javascript:history.go(-1)'">
            <button type="button" onClick="choice()">支払い情報入力</button>
        </form>
  </div>
  <div class="black-background" id="js-black-bg"></div>
</div>
