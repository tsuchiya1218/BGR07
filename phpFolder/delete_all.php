<?php
    session_start();

	//DBの接続部分を読み込む
	require_once './common/db_connect.php';
    $CCode = 1;
	$gID = $_GET['gID'];

    $sql = "DELETE FROM Cart WHERE CustomersCode = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($CCode));

    print "<script>location.replace('./cart.php');</script>";    
?>
