<?php
$page_title = 'マイページ';
session_start();
require "./common/header.php";
require "./common/banner.php";
?>
<?php

if ($_SESSION['cCode'] != '') {
    echo <<<EOM
    <div class="mypage" align="center">
    <h3>$_SESSION[cName]様</h3>
    <br/>
        <p><a href="./mypage_credit.php">クレジットカード情報</a></p>
        <p><a href="./mypage_login.php">ログイン情報</a></p>
        <p><a href="./mypage_personal.php">個人情報</a></p>
    </ul>
    </div>
    EOM;
} else {
    header('Location: ./index.php');
}

?>
<?php
require "./common/footer.php"
?>