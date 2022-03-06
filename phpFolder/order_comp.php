<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
?>
<link rel="stylesheet" type="text/css" href="./css/order.css">
<main>
    <p>
        ご注文ありがとうございました。<br>
        商品の発送は最後まで責任をもって行います<br>
        またのご利用をお待ちしております
    </p>
    <table border='1'>
        <tr>
            <th>商品名</th>
            <th>単価</th>
            <th>個数</th>
            <th>金額</th>
        </tr>
        <?php
        $totalPrice = 0;
        $totalAmount = 0;
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

        while (($rec = $stmt->FETCH(PDO::FETCH_ASSOC)) != null) {
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
            $totalPrice += $rec['Price'] * $rec['CartQuantity'];
            $totalAmount += $rec['CartQuantity'];
        }
        echo "<tr>\n";
        echo "  <td colspan=\"2\">合計</td>\n";
        echo "  <td class = >" . number_format($totalAmount) . "個</td>\n";
        echo "  <td class = >¥" . number_format($totalPrice) . "</td>\n";
        echo "</tr>\n";
        echo "</table\n";
        $sql = "SELECT *
            FROM Customers
            WHERE CustomersCode = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($_SESSION['cCode']));
        $rec = $stmt->FETCH(PDO::FETCH_ASSOC);
        $zip1    = substr($rec['CustomersZip'], 0, 3);
        $zip2    = substr($rec['CustomersZip'], 3);
        ?>
    </table>
    <table border="1">
        <tr>
            <th>郵便番号</th>
            <th>都道府県・市区町村</th>
            <th>町名・番地以下・建物名</th>
        </tr>
        <?php
        $sql = "SELECT CustomersCode,CustomersZip,CustomersAddress1,CustomersAddress2
        FROM Customers
        WHERE CustomersCode = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($_SESSION['cCode']));
        $rec = $stmt->FETCH(PDO::FETCH_ASSOC);
        $zip1    = substr($rec['CustomersZip'], 0, 3);
        $zip2    = substr($rec['CustomersZip'], 3);
        echo <<<EOM
    <tr>
        <td>$zip1-$zip2</td>
        <td>$rec[CustomersAddress1]</td>
        <td>$rec[CustomersAddress2]</td>
    </tr>
EOM;
        ?>
    </table>
    <table border="1">
        <tr>
            <th>商品合計金額</th>
            <th>手数料</th>
            <th>送料</th>
            <th>お支払い額</th>
        </tr>
        <tr>
            <td>￥1100</td>
            <td>￥340</td>
            <td>￥360</td>
            <td>合計￥1800</td>
        </tr>
    </table>
</main>
<?php
require "./common/footer.php";
?>