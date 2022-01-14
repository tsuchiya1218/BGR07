<?php
session_start();
//DBの接続部分を読み込む
?>

<?php
require "./site/header.php";
require "./site/banner.php";
?>

<div style="text-align:center">

<h3>情報入力</h3>
<p>--------------------------------------</p>
<h4>クレジットカード情報入力</h4>
<p>お客様の情報を入力してください。</p>
<hr>
<p>以下のフォームにデータを入力し、「次へ>>」ボタンを押してください。</p>
<p>*が付いている項目は必須項目です</p>
<table>
    <form method="POST" action="check_customer.php">
        <tr>
            <td align="right" valign="top">*クレジットカード番号：</td>
            <td align="left">
                <input type="text" size="20" name="credit" value="" placeholder="例:1234XXXX~" maxlength="30">
                <input type="text" size="3" name="credit" value="" maxlength="3" placeholder="CVV">
                <input type="text" size="4" name="credit" value="" maxlength="4" placeholder="XX/XX">
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">*お名前：</td>
            <td align="left">
                <input type="text" size="20" name="name" value="" placeholder="例:日本 電子" maxlength="30">
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">*住所：</td>
            <td align="left">
                <input type="text" size="60" name="address" value="" placeholder="例:東京都新宿区百人町1-25-4 日本電子ビル 6F 161号室">
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">電話番号：</td>
            <td align="left">
                <input type="tel" size="20" name="tel" value="" placeholder="例:03-3369-xxxx" maxlength="20">
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">*メールアドレス：</td>
            <td align="left">
                <input type="email" size="40" name="email" value="" placeholder="例:denshi@nichiden.com">
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td align="left">
                <input type="submit" value="次へ>>">
            </td>
        </tr>
    </form>
</table>
<p>--------------------------------------</p>

</div>

<?php
require "./site/footer.php"
?>
