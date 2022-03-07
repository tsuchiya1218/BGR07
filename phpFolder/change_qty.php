<?php
session_start();
//DBの接続部分を読み込む
require_once "./common/db_connect.php";
$gID = $_REQUEST['gID'];
$price = $_REQUEST['price'];
$gName = $_REQUEST['gName'];
$qty = $_REQUEST['changeQty'];
$subTotal = $price * $qty;
?>
<?php
// カートの個数を変更する
$sql = "UPDATE Cart SET CartQuantity = ?,SubTotal = ?
        WHERE CustomersCode = ? AND GoodsID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($qty,$subTotal,$_SESSION['cCode'],$gID));

$sql = "UPDATE Cart2 SET CartQuantity2 = ?,SubTotal2 = ?
        WHERE CustomersCode2 = ? AND GoodsID2 = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($qty,$subTotal,$_SESSION['cCode'],$gID));


if ($stmt->rowCount() > 0) {
    // 表示するメッセージ設定
    $_SESSION["msg"] = "商品名:{$gName}の個数を{$qty}個に変更しました";
    header("Location: cart.php");
    exit();
}
?>