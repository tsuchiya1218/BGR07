<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
require_once "./common/db_connect.php";
?>
<link rel="stylesheet" href="./css/index.css">
キャンペーン中の商品を表示<br>
（DBにキャンペーン中の値を付与し、SQLで検索し表示する）
<?php
$sql = "SELECT GoodsName,Price,ImgURL
        FROM Goods
        INNER JOIN Img
        ON Goods.GoodsID = Img.GoodsID
        INNER JOIN Campaign
        ON Goods.CampaignID = Campaign.CampaignID
        WHERE Price IS NOT NULL";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rec = $stmt->FETCH(PDO::FETCH_BOTH);
while (($rec = $stmt->FETCH(PDO::FETCH_ASSOC)) != null) {
    echo <<<EOM
     "\n". '<div class="item_flexbox">' . "\n"
        <div class="item_content">
            $rec[GoodsName]<br>
            <img src="./img/$rec[ImgURL]" width="200" height="200">
        </div>\n
    EOM;
}
?>
<?php
require "./common/footer.php";
?>