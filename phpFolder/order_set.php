<?php
session_start();
require_once "./common/db_connect.php";
/*$sql = "INSERT INTO OrderDetails(OrderDetailsID,GoodsID) 
        VALUES(?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($_SESSION['cCode'], $gID));
*/
//自動付番どうにかしろ

header("Location: order_comp.php");
exit();
