<?php
session_start();

$zip = $_REQUEST['zip'];
$address1 = $_REQUEST['address1'];
$address2 = $_REQUEST['address2'];

?>
<script src="./js/popup.js"></script>
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="./css/popup.css">
<div class="popup" id="js-popup">
    <div class="popup-inner">
        <p>※変更前に登録されていた住所の情報は削除されますのでご注意ください</p>
        <?php
        echo <<<EOM
        <form action="check_change_address.php" method="post">
            <input type="hidden" name="zip" value=$zip>
            <input type="hidden" name="address1" value=$address1>
            <input type="hidden" name="address2" value=$address2>
            <input type="submit" value="変更する">
            <button type="button" onClick="history.back()">戻る</button>
        </form>
        EOM;
        ?>
        <div class="close-btn" id="js-close-btn">
            <i class="fas fa-times"></i>
        </div>
    </div>
    <div class="black-background" id="js-black-bg"></div>
</div>