<?php
session_start();
//DBの接続部分を読み込む
require_once './common/db_connect.php';

$sql = "DELETE FROM Cart WHERE CustomersCode = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($_SESSION['cCode']));

header('Location: ./cart.php');
exit();
