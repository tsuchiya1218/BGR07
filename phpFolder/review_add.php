<?php
session_start();
require_once "./common/db_connect.php";
$gID = $_GET['gID'];
$sql = "INSERT INTO Review(CustomersCode,GoodsID) 
        VALUES(?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($_SESSION['cCode'], $gID));
$_SESSION['Msg'] = 'いいねしました';
header("Location: ./goods_detail.php?gID=$gID");
exit();
