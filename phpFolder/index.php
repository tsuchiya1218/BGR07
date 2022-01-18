<?php
require "./common/header.php";
require "./common/banner.php";
?>
<link rel="stylesheet" href="./css/index.css">
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