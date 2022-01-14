<?php
session_start();
//DBの接続部分を読み込む

?>

<?php $page_title = '顧客情報入力' ?>

<?php 
require './site/header.php' 
?>

<?php
require "./site/banner.php"
?>
<p align="center">お客様の情報を確認してください。</p>
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
    <input type="submit" value="次へ>>" onclick="location.href='./check_order.php'"/>
</div>
</br>
<?php require './site/footer.php' ?>