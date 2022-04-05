<?php
session_start();
require_once "./common/db_connect.php";
$sql = "SELECT COUNT(*) as cnt
        FROM OrderReq";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$row = $stmt->FETCH(PDO::FETCH_ASSOC);
$orderReq = $row['cnt'];

$sql = "SELECT COUNT(*) as cnt
        FROM OrderDetails";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$row = $stmt->FETCH(PDO::FETCH_ASSOC);
$orderDet = $row['cnt'] + 1;

$sql = "SELECT GoodsID,CartQuantity,SubTotal
        FROM Cart
        WHERE Cart.CustomersCode = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($_SESSION['cCode']));
        while (($rec = $stmt->FETCH(PDO::FETCH_ASSOC)) != null) {
                $sql = "INSERT INTO OrderDetails(OrderDetailsID,OrderID,GoodsID,Quantity,SubTotal) 
                        VALUES(?,?,?,?,?)";
                $stmt2 = $pdo->prepare($sql);
                $orderDet += 1;
                $stmt2->execute(array($orderDet,$orderReq,$rec['GoodsID'],$rec['CartQuantity'],$rec['SubTotal']));
            }

$sql = "DELETE FROM Cart 
        WHERE CustomersCode = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($_SESSION['cCode']));

header("Location: order_comp.php");
exit();
