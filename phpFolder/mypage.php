<?php
$page_title = 'マイページ';
session_start();
require "./common/header.php";
require "./common/banner.php";
?>
<?php $page_title = 'マイページ' ?>

<div class="mypage" align="center">
    <h3><?php echo $_SESSION['cName']?>様</h3>
    <br/>
        <p><a href="./mypage_credit.php">クレジットカード情報</a></p>
        <p><a href="./mypage_login.php">ログイン情報</a></p>
        <p><a href="./mypage_personal.php">個人情報</a></p>
    </ul>
</div>

<?php
require "./common/footer.php"
?>