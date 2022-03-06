<?php
session_start();
require_once "./common/db_connect.php";
$gID = $_REQUEST['gID'];
if (!isset($_SESSION['cCode'])) {
    $_SESSION['eMsg'] = 'いいねをするにはログインが必要です';
    header("Location: goods_detail.php?gID=$gID");
    exit();
} else {
    $sql = "SELECT COUNT(*) as cnt
            FROM Review
            WHERE CustomersCode = ?
            AND GoodsID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($_SESSION['cCode'],$gID));
    $rec = $stmt->FETCH(PDO::FETCH_ASSOC);
    if($rec['cnt'] == 0){
        header("Location: ./review_add.php?gID=$gID");
        exit();
    }else{
        header("Location: ./review_remove.php?gID=$gID");
        exit();
    }

}
