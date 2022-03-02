<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
require_once "./common/db_connect.php";

?>
<link rel="stylesheet" href="./css/display_contents.css">
<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
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
            ORDER BY Goods.ReviewCount DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    while (($rec = $stmt->FETCH(PDO::FETCH_ASSOC)) != null) {
        if ($rec['CampaignID'] >= 200) {
            echo <<<EOM
        <div class="item_content">
            <a href="./goods_detail.php?gID=$rec[GoodsID]">
            <div class="content_img">
                <img src="./img/$rec[ImgURL]" width="200" height="200">
                <div class="sale_images">
                    <img src="./img/sale.png" width="100px" height="100px">
                </div>
            </div>
            </a><br>
            $rec[GoodsName]<br>
            $rec[CategoryName]<br>
            $rec[Price]<br>
            $rec[DisRatio]%引き<br>
            合計価格「$rec[MoreThan]」円以上で500円引き<br>
            いいね数「$rec[ReviewCount]」
        </div>\n
    EOM;
        } else {
            echo <<<EOM
        <div class="item_content">
            <a href="./goods_detail.php?gID=$rec[GoodsID]">
            <div class="content_img">
                <img src="./img/$rec[ImgURL]" width="200" height="200">
            </div>
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
    }
    ?>
</div>
<?php
require "./common/footer.php";
?>