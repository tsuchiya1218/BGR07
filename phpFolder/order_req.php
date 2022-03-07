<?php
session_start();
require_once "./common/db_connect.php";
$sql = "SELECT COUNT(*) as cnt
        FROM OrderReq";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$row = $stmt->FETCH(PDO::FETCH_ASSOC);
$orderReq = $row['cnt'] + 1;

$sql = "SELECT SubTotal
        FROM Cart
        WHERE CustomersCode = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($_SESSION['cCode']));
$cartTotal = 0;
while (($rec = $stmt->FETCH(PDO::FETCH_ASSOC)) != null) {
    $cartTotal += $rec['SubTotal'];
}


$date = date("Y/m/d H:i:s");

$sql = "INSERT INTO OrderReq(OrderID,CustomersCode,OrderDay,SendID,Postage,TotalPrice) 
        VALUES(?,?,?,?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($orderReq,$_SESSION['cCode'],$date,1,0,$cartTotal));

header("Location: order_set.php");
exit();
