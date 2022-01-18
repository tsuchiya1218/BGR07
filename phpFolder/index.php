<?php
require "./common/header.php";
require "./common/banner.php";
?>
<div class="item_flexbox">
<?php
for ($i = 1; $i < 9; $i++) {
    echo <<<EOM
    <div class="item_content">
        さんぷる
    </div>
    EOM;
}
?>

<?php
require "./common/footer.php";
?>