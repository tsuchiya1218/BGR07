<?php
session_start();
require "./common/header.php";
require "./common/banner.php";

?>
<script src="./js/popup.js"></script>
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="./css/popup.css">

<div class="popup" id="js-popup">
    <div class="popup-inner">
        <p>住所変更する別のページに移動します。よろしいでしょうか？</p>
        <button type="button" onClick="history.back()">戻る</button>
        <button type="button" onClick="document.location='./change_address.php'">決済方法の選択に進む</button>
        <div class="close-btn" id="js-close-btn">
            <i class="fas fa-times"></i>
        </div>
    </div>
    <div class="black-background" id="js-black-bg"></div>
</div>

<?php
require "./common/footer.php";
?>