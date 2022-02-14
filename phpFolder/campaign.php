<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
require_once "./common/db_connect.php";
?>
<link rel="stylesheet" href="./css/index.css">
<div class="item_flexbox">
<?php
$sql = "SELECT Goods.GoodsID,Goods.GoodsName,CategoryName,Price,ImgURL,ReviewCount,DisRatio,MoreThan
        FROM Goods
        INNER JOIN Category
        ON Goods.CategoryID = Category.CategoryID
        INNER JOIN Img
        ON Goods.GoodsID = Img.GoodsID
        INNER JOIN Campaign
        ON Goods.CampaignID = Campaign.CampaignID
        WHERE Goods.CampaignID != 0";
$stmt = $pdo->prepare($sql);
$stmt->execute();
while (($rec = $stmt->FETCH(PDO::FETCH_ASSOC)) != null) {
    echo <<<EOM
        <div class="item_content">
            <a href="./goods_detail.php?gID=$rec[GoodsID]">
                <img src="./img/$rec[ImgURL]" width="200" height="200">
            </a><br>
            $rec[GoodsName]<br>
            $rec[CategoryName]<br>
            $rec[Price]<br>
            $rec[DisRatio]%引き<br>
            合計価格「$rec[MoreThan]」円以上で500円引き<br>
            いいね数「$rec[ReviewCount]」
        </div>\n
    EOM;
}
?>
<?php
require "./common/footer.php";
?>