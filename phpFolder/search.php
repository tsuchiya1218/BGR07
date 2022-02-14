<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
require_once "./common/db_connect.php";
$catID = $_GET['catID'];
?>
<link rel="stylesheet" href="./css/index.css">
キャンペーン中の商品を表示<br>
（DBにキャンペーン中の値を付与し、SQLで検索し表示する）
<?php
$sql = "SELECT Goods.GoodsName,CategoryName,Price,ImgURL,DisRatio
        FROM Goods
        INNER JOIN Category
        ON Goods.CategoryID = Category.CategoryID
        INNER JOIN Img
        ON Goods.GoodsID = Img.GoodsID
        INNER JOIN Campaign
        ON Goods.CampaignID = Campaign.CampaignID
        WHERE Category.CategoryID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($catID));
while (($rec = $stmt->FETCH(PDO::FETCH_ASSOC)) != null) {
    echo <<<EOM
        <div class="item_content">
            <a href="./goods_detail.php">
                <img src="./img/$rec[ImgURL]" width="200" height="200">
            </a><br>
            $rec[GoodsName]<br>
            $rec[CategoryName]<br>
            ￥1100<br>
            $rec[DisRatio]%引き
        </div>\n
    EOM;
}
?>
<?php
require "./common/footer.php";
?>