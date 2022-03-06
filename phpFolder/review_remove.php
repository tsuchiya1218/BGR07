<?php
session_start();
require_once "./common/db_connect.php";
$gID = $_GET['gID'];
$sql = "DELETE FROM Review
        WHERE CustomersCode = ? 
        AND GoodsID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($_SESSION['cCode'], $gID));
$sql = "SELECT COUNT(*) as cnt
        FROM Review
        WHERE GoodsID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($gID));
$rec = $stmt->FETCH(PDO::FETCH_ASSOC);
$revCnt = $rec['cnt'];

$sql = "UPDATE Goods SET ReviewCount = ? 
        WHERE GoodsID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($revCnt,$gID));

$_SESSION['Msg'] = 'いいねを外しました';
header("Location: ./goods_detail.php?gID=$gID");
exit();
