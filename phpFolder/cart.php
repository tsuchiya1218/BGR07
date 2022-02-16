<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
require_once "./common/db_connect.php";
$sID = session_id();
$CCode = 1;
?>
<?php

$sql = "SELECT COUNT(*) AS cnt FROM Cart WHERE CustomersCode = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($CCode));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row["cnt"] > 0) {
    //プリペアードステートメントを使い、商品詳細の表示に必要な情報を取得する
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
    $stmt->execute(array($CCode));

    echo <<< EOM
    <table border='1'>
    <tr>
        <th>商品画像</th>
        <th>単価</th>
        <th>個数</th>
        <th>金額</th>
        <th></th>
    </tr>\n
    EOM;
    $totalQuantity = 0;
    $totalPrice = 0;
    while (($rec = $stmt->FETCH(PDO::FETCH_ASSOC)) != null) {
        $nfPrice = number_format($rec['Price']);
        $nfCartQuantity = number_format($rec['CartQuantity']);
        $nfTotalPrice = number_format($totalPrice);
        echo <<< EOM
        <tr>
            <td>
                $rec[GoodsName]<br>
                <img src="./img/$rec[ImgURL]" width="200" height="200">
            </td>
            <td align = right>&yen;$nfPrice</td>
            <td align = right>
                <form method="POST" action="change_qty.php">
                <input type="hidden" name="gID" value=$rec[GoodsID]>
                <input type="hidden" name="gName" value=$rec[GoodsName]>
                <select name="changeQty">\n
        EOM;
        //CartQuantityを取得（SelectBoxのデフォ値を同じにする）
        for ($i = 1; $i <= 10; $i++) {
            if ($i != $rec['CartQuantity']) {
                echo "            <option align = right value=$i>{$i}個</option>\n";
            } else {
                echo "            <option align = right value=$i selected>{$i}個</option>\n";
            }
        }
        echo <<< EOM
                </select>
                <input type="submit" value="変更">
                </form>
            </td>
            <td align = right>&yen$rec[SubTotal]</td>
            <td><a href="delete_goods.php?gID=$rec[GoodsID]&gName=$rec[GoodsName]">削除</a>
            </td>
        </tr>\n
        EOM;
        $totalQuantity += $nfCartQuantity;  
        $totalPrice += $rec['SubTotal'];
    }
    $nfTotalPrice = number_format($totalPrice);
    echo <<< EOM
    <tr>
        <td colspan="2" align = left>合計</td>
        <td align = right>合計：{$totalQuantity}点</td>
        <td align = right>&yen;$nfTotalPrice</td>
        <td align = right></td>
    </tr>
    </table>\n
    EOM;
    //msgを表示する
    echo <<< EOM
    <table>
    <tr>
        <td>商品を注文するには右のボタンをクリックして注文ページに進んでください。</td>
        <td>
            <input type="button" value="商品を注文する" onClick="document.location='./cart_confirm.php'">
        </td>
    </tr>
    <tr>
        <td>
            買い物カゴを空にするには右のボタンをクリックしてください。
        </td>
        <td>
        <form method="POST" action="delete_all.php">
            <input type="submit" value="買い物カゴを空にする">
        </form>
        </td>
    </tr>
    </table>
    EOM;
} else {
    echo "<p>カートの中に商品がありません。</p>\n";
}
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}


?>
<?php require "./common/footer.php";?>