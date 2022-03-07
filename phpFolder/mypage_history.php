<?php
session_start();
require_once "./common/db_connect.php";
$cCode = $_SESSION['cCode'];
?>
<script src="./js/popup.js"></script>
<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="./css/history.css">
<link rel="stylesheet" href="./css/popup_mypage_history.css">
<div class="popup" id="js-popup">
    <div class="popup-inner">
        <h3><?= $_SESSION["cName"] ?>様の注文履歴</h3>
        <table border='1' class="history">
            <tr>
                <th>商品名</th>
                <th>単価</th>
                <th>個数</th>
                <th>金額</th>
            </tr>
            <?php
            $totalPrice = 0;
            $totalAmount = 0;
            $sql = "SELECT Cart2.CustomersCode2,Cart2.GoodsID2,CartQuantity2,SubTotal2,GoodsName,CategoryName,
                    Price,ImgURL,ColorName
            FROM Cart2
            INNER JOIN Goods
            ON Cart2.GoodsID2 = Goods.GoodsID
            INNER JOIN Category
            ON Goods.CategoryID = Category.CategoryID
            INNER JOIN Img
            ON Goods.GoodsID = Img .GoodsID
            INNER JOIN Variation
            ON Goods.GoodsID = Variation.GoodsID
            INNER JOIN Color
            ON Variation.ColorID = Color.ColorID
            WHERE Cart2.CustomersCode2 = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array($_SESSION['cCode']));

            while (($rec = $stmt->FETCH(PDO::FETCH_ASSOC)) != null) {
                $GoodsID = $rec['GoodsID2'];
                $CartAmount = $rec['CartQuantity2'];
                $nfSubTotal = number_format($rec['SubTotal2']);
                $nfPrice = number_format($rec['Price']);
                $nfCQty = number_format($rec['CartQuantity2']);
                echo <<< EOM
        <tr>
        <td class = >$rec[GoodsName]<br><img src="./img/$rec[ImgURL]" width="200" height="200"></td>
        <td class = >￥$nfPrice</td>
        <td class = >{$nfCQty}個</td>
        <td class = >￥$nfSubTotal</td>
        </tr>\n
        EOM;
                $totalPrice += $rec['Price'] * $rec['CartQuantity2'];
                $totalAmount += $rec['CartQuantity2'];
            }
            echo "<tr>\n";
            echo "  <td colspan=\"2\">合計</td>\n";
            echo "  <td class = >" . number_format($totalAmount) . "個</td>\n";
            echo "  <td class = >¥" . number_format($totalPrice) . "</td>\n";
            echo "</tr>\n";
            // echo "</table\n";
            $sql = "SELECT *
            FROM Customers
            WHERE CustomersCode = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array($_SESSION['cCode']));
            $rec = $stmt->FETCH(PDO::FETCH_ASSOC);
            $zip1    = substr($rec['CustomersZip'], 0, 3);
            $zip2    = substr($rec['CustomersZip'], 3);
            ?>
            <tr>
                <th>郵便番号</th>
                <th>都道府県・市区町村</th>
                <th colspan="2">町名・番地以下・建物名</th>
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
                <td colspan="2">$rec[CustomersAddress2]</td>
            </tr>
        EOM;
            ?>
            <tr>
                <th>商品合計金額</th>
                <th>手数料</th>
                <th>送料</th>
                <th>お支払い額</th>
            </tr>
            <tr>
                <td>￥<?=number_format($totalPrice)?></td>
                <td>￥0</td>
                <td>￥0</td>
                <td>合計￥<?=number_format($totalPrice)?></td>
            </tr>
        </table>
        <br />
        <button type="button" onClick="history.back()">戻る</button>
    </div>
    <div class="black-background" id="js-black-bg"></div>
</div>