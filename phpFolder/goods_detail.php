<?php
require "./common/header.php";
require "./common/banner.php";
?>
<main>
    <link rel="stylesheet" href="./css/goods_detail.css">
    <div class="goods_left">
        <img src="./img/case/case1.jpg" width="280" height="300">
        ↓ここに別の画像を数枚表示↓<br>
        　□　□　□　□<br>
        ↑ここに別の画像を数枚表示↑

    </div>

    <div class="goods_right">
        <h2>「おれのスマホが一番だ」</h2>
        <span class="price">
            <h3>￥1,100</h3>
        </span>
        <button type="button">”♡”</button>
        <table>
            <tr>
                <td>機種</td>
                <td>iPhone7</td>
            </tr>
            <tr>
                <td>色</td>
                <td>黒</td>
            </tr>
            <tr>
                <td>カテゴリ</td>
                <td>スマホケース</td>
            </tr>
        </table>
        <form action="add_cart.php" method="POST">
            <select name="quantity">
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo "<option value=$i>{$i}個</option>\n";
                }
                echo <<< EOM
                </select>
                    <input type="hidden" name="stock" value=$nf_Stock>
                    <input type="submit" value="カートに入れる">
                EOM;
                ?>
        </form>
    </div>
    <h4>注意事項</h4>
    <ul>
        <li>画像は合成イメージです。実際のアイテムとは異なる場合があります。</li>
        <li>ご使用のモニターの設定により、実際のアイテムと色味が異なる場合があります。</li>
    </ul>


</main>
<?php
require "./common/footer.php"
?>