<?php
session_start();
?>

<script src="./js/popup.js"></script>
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="./css/popup.css">

<div class="popup" id="js-popup">
  <div class="popup-inner">
    <p>お支払いを完了してください</p>
    <form action="order_req.php" method="POST">
      <p>カード名義人：<input type="text"></p>
      <p>カード番号：<input type="text"></p>
      <p>カード有効期限：<input type="text"></p>
      <p>カードCVV：<input type="text"></p>
      <input type="submit" value="決済">
    </form>
  </div>
  <div class="black-background" id="js-black-bg"></div>
</div>
