<?php
session_start();
//DBの接続部分を読み込む
require_once "./common/db_connect.php";
$gID = $_REQUEST['gID'];
$gName = $_REQUEST['gName'];
$qty = $_REQUEST['changeQty'];
?>
<?php
// カートの個数を変更する
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