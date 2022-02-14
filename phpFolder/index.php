<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
require_once "./common/db_connect.php";

?>
<link rel="stylesheet" href="./css/index.css">
<div class="item_flexbox">
    <?php
    echo <<<EOM
        <div class="item_content">
                <a href="./goods_detail.php">
                    <img src="./img/case/case1.jpg" width="200" height="200">
                </a><br>
                さんぷる1(ここだけ画像リンク)<br>
                カテゴリ名<br>
                ￥1000
        </div>\n
    EOM;
    for ($i = 2; $i < 10; $i++) {
        echo <<<EOM
        <div class="item_content">
            <a href="./goods_detail.php">
                <img src="./img/case/case1.jpg" width="200" height="200">
            </a><br>
            さんぷる$i<br>
            カテゴリ名<br>
            ￥1100
        </div>\n
    EOM;
    }
    ?>
</div>
<?php
require "./common/footer.php";
?>