<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
require_once "./common/db_connect.php";
$gID = $_REQUEST['gID'];
?>
<link rel="stylesheet" href="./css/goods_detail.css">
<?php
$sql = "SELECT Goods.GoodsID,Goods.GoodsName,CategoryName,Price,ImgURL,ReviewCount,ColorName,DisRatio,MoreThan,GoodsExplanation
            FROM Goods
            INNER JOIN Category
            ON Goods.CategoryID = Category.CategoryID
            INNER JOIN Img
            ON Goods.GoodsID = Img.GoodsID
            INNER JOIN Campaign
            ON Goods.CampaignID = Campaign.CampaignID
            INNER JOIN Variation
            ON Goods.GoodsID = Variation.GoodsID
            INNER JOIN Color
            ON Variation.ColorID = Color.ColorID
            WHERE Goods.GoodsID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($gID));
$rec = $stmt->FETCH(PDO::FETCH_ASSOC)
?>
<div class="goods_left">
    <img src="./img/<?=$rec["ImgURL"]?>" width="280" height="300">
    ↓ここに別の画像を数枚表示↓<br>
    　□　□　□　□<br>
    ↑ここに別の画像を数枚表示↑

</div>

<div class="goods_right">
    <h2><?=$rec["GoodsName"]?></h2>
    <span class="price">
        <h3>￥<?=$rec["Price"]?></h3>
    </span>
    <button type="button">”♡”</button>
    <table>
        <tr>
            <td>機種</td>
            <td>iPhone7</td>
        </tr>
        <tr>
            <td>色</td>
            <td><?=$rec["ColorName"]?></td>
        </tr>
        <tr>
            <td>カテゴリ</td>
            <td><?=$rec["CategoryName"]?></td>
        </tr>
    </table>
    <form action="add_cart.php" method="POST">
        <select name="qty">
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<option value=$i>{$i}個</option>\n";
            }
            echo <<< EOM
                </select>
                    <input type="hidden" name="gID" value=$gID>
                    <input type="submit" value="カートに入れる">
                EOM;
            if(isset($_SESSION['eMsg'])) {
                echo $_SESSION['eMsg'];
                unset($_SESSION['eMsg']);
            }
            ?>
    </form>
    <h4>説明</h4>
    <p><?=$rec["GoodsExplanation"]?></p>
</div>
<h4>注意事項</h4>
<ul>
    <li>画像は合成イメージです。実際のアイテムとは異なる場合があります。</li>
    <li>ご使用のモニターの設定により、実際のアイテムと色味が異なる場合があります。</li>
</ul>
<h4>レビュー数</h4>
<p><?=$rec["ReviewCount"]?></p>

<?php
require "./common/footer.php"
?>