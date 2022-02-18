<?php
session_start();
//DBの接続部分を読み込む
require_once "./common/db_connect.php";
$sid = session_id();
$gID = $_REQUEST['gID'];
$gName = $_REQUEST['gName'];
$qty = $_REQUEST['changeQty'];
// $CCode = 1;
?>
<?php
// カートのデータを削除するSQL文設定
$sql = "UPDATE Cart SET CartQuantity = ? 
        WHERE CustomersCode = ? AND GoodsID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($qty,$_SESSION['cCode'],$gID));

if ($stmt->rowCount() > 0) {
    // 表示するメッセージ設定
    $_SESSION["msg"] = "商品名:{$gName}の個数を{$qty}個に変更しました";
    header("Location: cart.php");
    exit();
}
?>