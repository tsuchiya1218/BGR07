<?php
require "./common/header.php";
require "./common/banner.php";
?>
<script src="./js/order_confirm.js"></script>

<p>
    以下の内容でご注文内容を確定致します。<br>
    よろしければ決済方法の選択に進んでください
</p>
<table border='1'>
    <tr>
        <th>商品名</th>
        <th>単価</th>
        <th>個数</th>
        <th>金額</th>
    </tr>
    <tr>
        <td>ダミー</td>
        <td align=right>&yen;1,100</td>
        <td align=right>1個</td>
        <td align=right>&yen;1,100</td>
        </td>
    </tr>
</table>
<table border="1">
    <tr>
        <th>郵便番号</th>
        <th>都道府県</th>
        <th>市区町村</th>
        <th>建物名</th>
    </tr>
    <tr>
        <td>100-0001</td>
        <td>東京都</td>
        <td>千代田区千代田一丁目一番地</td>
        <td>皇居</td>
    </tr>
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
<button type="button" onClick="history.back()">戻る</button>
<button type="button" onClick="checkout()">決済方法の選択に進む</button>

<?php
require "./common/footer.php";
?>