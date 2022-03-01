<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
?>
<?php
    $totalPrice = 0;
    $totalAmount = 0;
    echo <<< EOM
    <table border='1'>
    <tr>
        <th>商品名</th>
        <th>単価</th>
        <th>個数</th>
        <th>金額</th>
    </tr>\n
    EOM;
    $sql = "SELECT CustomersCode,Cart.GoodsID,CartQuantity,SubTotal,GoodsName,CategoryName,
                            Price,ImgURL,ColorName
            FROM Cart
            INNER JOIN Goods
            ON Cart.GoodsID = Goods.GoodsID
            INNER JOIN Category
            ON Goods.CategoryID = Category.CategoryID
            INNER JOIN Img
            ON Goods.GoodsID = Img .GoodsID
            INNER JOIN Variation
            ON Goods.GoodsID = Variation.GoodsID
            INNER JOIN Color
            ON Variation.ColorID = Color.ColorID
            WHERE Cart.CustomersCode = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($_SESSION['cCode']));

    while(($rec = $stmt->FETCH(PDO::FETCH_ASSOC))!=null){
        $GoodsID = $rec['GoodsID'];
        $CartAmount = $rec['CartQuantity'];
        $nfSubTotal = number_format($rec['SubTotal']);
        $nfPrice = number_format($rec['Price']);
        $nfCQty = number_format($rec['CartQuantity']);
        echo <<< EOM
        <tr>
            <td class = >$rec[GoodsName]<br><img src="./img/$rec[ImgURL]" width="200" height="200"></td>
            <td class = >￥$nfPrice</td>
            <td class = >{$nfCQty}個</td>
            <td class = >￥$nfSubTotal</td>
        </tr>\n
        EOM;
        $totalPrice += $rec['Price']*$rec['CartQuantity'];
        $totalAmount += $rec['CartQuantity'];
    }
        echo "<tr>\n";
        echo "  <td colspan=\"2\">合計</td>\n";
        echo "  <td class = >" . number_format($totalAmount) . "個</td>\n";
        echo "  <td class = >¥". number_format($totalPrice) ."</td>\n";
        echo "</tr>\n";
        echo "</table\n";
?>
<p>
    こちらの内容で注文の内容を確定し、お届け先の住所の選択に進みます。<br>
    よろしいですか？
</p>

<button type="button" onClick="history.back()">戻る</button>
<button type="button" onClick="document.location='./order_address.php'">配送先選択へ進む</button>
<?php
require "./common/footer.php";
?>