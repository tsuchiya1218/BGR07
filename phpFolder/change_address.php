<?php
//02/22編集中
//このページの前後に、住所変更ページに遷移する旨、住所を変更する旨を確認するポップアップ
session_start();
//DBの接続部分を読み込む
require_once "./common/db_connect.php";
$gID = $_REQUEST['gID'];
$gName = $_REQUEST['gName'];
$qty = $_REQUEST['changeQty'];
?>

以下に新しく登録する住所を入力してください
※変更前に登録されていた住所の情報は削除されますのでご注意ください
<form action="check_change_address.php" method="post">
    <tr>
        <td align="right" valign="top">郵便番号：</td>
        <td>
            <input type="text" size="20" name="zip" value="" placeholder="例:1690073(ハイフンなし)" maxlength="7">
            <?php
            if (isset($_SESSION['eMsg']['zip'])) {
                echo '<br>' . $_SESSION['eMsg']['zip'];
                unset($_SESSION['eMsg']['zip']);
            }
            ?>
        </td>
    </tr>
    <tr>
        <td align="right" valign="top">都道府県・市区町村：</td>
        <td>
            <input type="text" size="30" name="address" value="" placeholder="例:東京都新宿区">
            <?php
            if (isset($_SESSION['eMsg']['address1'])) {
                echo '<br>' . $_SESSION['eMsg']['address1'];
                unset($_SESSION['eMsg']['address1']);
            }
            ?>
        </td>
    </tr>
    <tr>
        <td align="right" valign="top">町名・番地以下・建物名：</td>
        <td>
            <input type="text" size="30" name="address" value="" placeholder="例:百人町1-25-4 日本電子ビル 6F 161号室">
            <?php
            if (isset($_SESSION['eMsg']['address2'])) {
                echo '<br>' . $_SESSION['eMsg']['address2'];
                unset($_SESSION['eMsg']['address2']);
            }
            ?>
        </td>   
    </tr>
</form>
<?php


// カートのデータを削除するSQL文設定
$sql = "UPDATE Customer 
        SET CustomersZip,CustomerAddress1 = ?,CustomerAddress2 = ? 
        WHERE CustomersCode = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(？？？));

if ($stmt->rowCount() > 0) {
    // 表示するメッセージ設定
    $_SESSION["msg"] = "商品名:{$gName}の個数を{$qty}個に変更しました";
    header("Location: cart.php");
    exit();
}
?>