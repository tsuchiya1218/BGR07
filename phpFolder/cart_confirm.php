<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
?>
//商品購入ボタンを押した際
<p>
    こちらの内容で注文の内容を確定し、お届け先の住所の選択に進みます。<br>
    よろしいですか？
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
<button type="button" onClick="history.back()">戻る</button>
<button type="button" onClick="document.location='./order_address.php'">配送先選択へ進む</button>
<?php
require "./common/footer.php";
?>