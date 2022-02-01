<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
?>

<link rel="stylesheet" href="./css/index.css">
キャンペーン中の商品を表示<br>
（DBにキャンペーン中の値を付与し、SQLで検索し表示する）
<?php
echo "\n".'<div class="item_flexbox">'."\n";
for ($i = 1; $i < 9; $i++) {
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