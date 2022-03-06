<?php
session_start();
require_once "./common/db_connect.php";
$gID = $_GET['gID'];
$sql = "DELETE FROM Review
        WHERE CustomersCode = ? 
        AND GoodsID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($_SESSION['cCode'], $gID));
$_SESSION['Msg'] = 'いいねを外しました';
header("Location: ./goods_detail.php?gID=$gID");
exit();
