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
<div class="page_body">
    <div class="goods_left">
        <img src="./img/<?= $rec["ImgURL"] ?>" width="280" height="300">
        <br>↓ここに別の画像を数枚表示↓<br>
        　□　□　□　□<br>
        ↑ここに別の画像を数枚表示↑

    </div>

    <div class="goods_right">
        <h2><?= $rec["GoodsName"] ?></h2>
        <div class="price_row">
            <h3>￥<?= $rec["Price"] ?></h3>
            <div class="review_spacer">
            </div>
            <div class="review_button">
                <form action="./review_check.php" method="GET">
                    <input type="hidden" name="gID" value="<?= $gID ?>">
                    <input type="submit" name="review" value="♡">
                </form>
            </div>
            <div class="review_count">
                <?= $rec["ReviewCount"] ?>
            </div>
        </div>
        <?php
        if (isset($_SESSION['eMsg'])) {
            echo '<div class="message">' . $_SESSION['eMsg'] . '</div>';
            unset($_SESSION['eMsg']);
        }
        if (isset($_SESSION['Msg'])) {
            echo '<div class="message">' . $_SESSION['Msg'] . '</div>';
            unset($_SESSION['Msg']);
        }
        ?>
        <table>
            <tr>
                <th>機種：</th>
                <td>iPhone7</td>
            </tr>
            <tr>
                <th>色：</th>
                <td><?= $rec["ColorName"] ?></td>
            </tr>
            <tr>
                <th>カテゴリ：</th>
                <td><?= $rec["CategoryName"] ?></td>
            </tr>
        </table>
        <div class="qty_row">
            <form action="check_cart_login.php" method="POST">
                <select name="handQty">
                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        if ($i == 1) {
                            echo "<option value=$i>{$i}個</option>\n";
                        }
                        echo "            <option value=$i>{$i}個</option>\n";
                    }
                    echo <<< EOM
                        </select>
                            <input type="hidden" name="handGID" value=$gID>
                            <input type="submit" value="カートに入れる">
                EOM;
                    if (isset($_SESSION['eMsg'])) {
                        echo '<div class="message">' . $_SESSION['eMsg'] . '</div>';
                        unset($_SESSION['eMsg']);
                    }
                    ?>
            </form>
        </div>
        <div class="explanation">
            <h4>説明</h4>
            <p><?= $rec["GoodsExplanation"] ?></p>
        </div>
    </div>
    <h4>注意事項</h4>
    <ul style="list-style: none;">
        <li>画像は合成イメージです。実際のアイテムとは異なる場合があります。</li>
        <li>ご使用のモニターの設定により、実際のアイテムと色味が異なる場合があります。</li>
    </ul>
</div>
<?php
require "./common/footer.php"
?>