<?php
    session_start();

	//DBの接続部分を読み込む
	require_once './common/db_connect.php';
	$gID = $_GET['gID'];

    $sql = "DELETE FROM Cart WHERE CustomersCode = ? AND GoodsID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($_SESSION['cCode'],$gID));

    $sql = "DELETE FROM Cart2 WHERE CustomersCode2 = ? AND GoodsID2 = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($_SESSION['cCode'],$gID));

    print "<script>location.replace('./cart.php');</script>";    
?>
