<?php
$page_title = '登録内容確認';
require "./common/header.php";
?>
<hr>
<p align="center">以下の内容で登録してよろしいですか？</p>
<table align="center">
    <tr>
        <td align="right">お名前：</td>
        <td>
            <?= $_REQUEST['name'] ?>
        </td>
    </tr>
    <tr>
        <td align="right">住所：</td>
        <td>
            <?= $_REQUEST['address'] ?>
        </td>
    </tr>
    <tr>
        <td align="right">電話番号：</td>
        <td>
            <?= $_REQUEST['tel'] ?>
        </td>
    </tr>
    <tr>
        <td align="right">メールアドレス：</td>
        <td>
            <?= $_REQUEST['email'] ?>
        </td>
    </tr>
    <tr>
        <td align="right">パスワード：</td>
        <td>
            表示していません
        </td>
    </tr>
</table>
<div align="center">
    <input type="button" value="<<戻る" onclick="history.back();" />
    &nbsp;&nbsp;&nbsp;
    <input type="submit" value="次へ>>" onclick=""/>
</div>

<?php
require "./common/footer.php";
?>