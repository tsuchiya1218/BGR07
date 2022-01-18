<?php
require "./common/header.php";
require "./common/banner.php";
?>
<link rel="stylesheet" href="./css/index.css">
<?php
echo "\n".'<div class="item_flexbox">'."\n";
echo <<<EOM
<div class="item_content">
    さんぷる1(ここだけ画像リンク)<br>
    <a href="./goods_detail.php">
        <img src="./img/case/case1.jpg" width="200" height="200">
    </a>
</div>\n
EOM;
for ($i = 2; $i < 10; $i++) {
    echo <<<EOM
        <div class="item_content">
            さんぷる$i<br>
            <img src="./img/case/case1.jpg" width="200" height="200">
        </div>\n
    EOM;
}
?>
</div>

<?php
require "./common/footer.php";
?>