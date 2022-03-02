<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
require_once "./common/db_connect.php";
//空白のまま検索するとindexに遷移
if ($_POST['word'] == '') {
    header("Location: ./index.php");
    exit();
}
$word = '%' . $_POST['word'] . '%';
?>
<link rel="stylesheet" href="./css/display_contents.css">
<?php
$sql = "SELECT COUNT(*) AS cnt 
            FROM Goods
            WHERE GoodsName LIKE ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($word));
$row = $stmt->FETCH(PDO::FETCH_BOTH);
if ($row['cnt'] == 0) {
    echo "「" . $_POST['word'] . "」に関する検索結果が見つかりませんでした。";
} else {
    $sql = "SELECT Goods.GoodsID,Goods.GoodsName,CategoryName,Price,
                GoodsExplanation,ImgURL,ReviewCount,DisRatio,MoreThan
            FROM Goods
            INNER JOIN Category
            ON Goods.CategoryID = Category.CategoryID
            INNER JOIN Img
            ON Goods.GoodsID = Img.GoodsID
            INNER JOIN Campaign
            ON Goods.CampaignID = Campaign.CampaignID
            WHERE Goods.GoodsName LIKE ?
            OR GoodsExplanation LIKE ?
            OR Category.CategoryName LIKE ?
            ORDER BY Goods.ReviewCount DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($word, $word, $word));
    $flag = false;
    while (($rec = $stmt->FETCH(PDO::FETCH_ASSOC)) != null) {
        while ($flag == false) {
            echo "「" . $_POST['word'] . "」に関する検索結果が".' [カウントうまくできないんだけど]件見つかりました。<br>';
            echo '<div class="item_flexbox">';
            $flag = true;
        }
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
}
?>
</div>
<?php
require "./common/footer.php";
?>