<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
?>
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
<?php
require "./common/footer.php";
?>