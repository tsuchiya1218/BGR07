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
    <ul style="list-style: none;">
        <li><a href="">クレジットカード情報</a></li>
        <li><a href=""></a></li>
        <li><a href=""></a></li>
        <li><a href=""></a></li>
    </ul>
</div>

<?php
require "./common/footer.php"
?>