<?php
session_start();
//DBの接続部分を読み込む
require_once "./common/db_connect.php";
$sID = session_id();
$CCode = 1;
$gID = $_REQUEST['gID'];
$qty = $_REQUEST['qty'];
?>
<?php
//カート内に商品があるかどうかを判断する
$sql = "SELECT COUNT(*) AS cnt FROM Cart WHERE CustomersCode = ? AND GoodsID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($CCode, $gID));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


if (($row["cnt"] > 0)) {
    //同じ商品番号がある場合、リダイレクトしてエラーメッセージを飛ばす
    $_SESSION['eMsg'] = '既に商品がカートに存在します。';
    header('Location: goods_detail.php?id=' . $gID);
    exit();
}

/*注文個数が在庫数を超える場合、リダイレクトしてエラーメッセージを飛ばす
if ($qty > $stock) {
    $_SESSION['eMsg'] = '商品名「' . $gName . '」の在庫数は' . $stock . '個です。個数は在庫数以下に変更してください。';
    header('Location: goods_detail.php?id=' . $gID);
    exit();
}
*/

// カートにデータを挿入するSQL文設定
$sql = "INSERT INTO Cart(CustomersCode,GoodsID,CartQuantity) VALUES(?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($CCode, $gID, $qty));

header('Location: ./add_comp.php');
exit();
