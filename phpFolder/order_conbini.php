<?php
session_start();
?>
<script src="./js/order_confirm.js"></script>
<script src="./js/popup.js"></script>
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="./css/popup.css">

<div class="popup" id="js-popup">
  <div class="popup-inner">
    <form action="order_set.php" method="POST">
      <p>受付方法：（コンビニ払い）</p>
      <p>近くの８TWELVEのコンビニにて決済お願い致します。</p>
      <img src="./img/conbiniISBN.png">
      <p>お客番号：1234-1234-1234</p>
      <input type="submit" value="決済">
    </form>
  </div>
  <div class="black-background" id="js-black-bg"></div>
</div>
