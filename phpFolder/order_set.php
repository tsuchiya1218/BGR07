<?php
session_start();
require_once "./common/db_connect.php";


$sql = "DELETE FROM Cart 
        WHERE CustomersCode = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($_SESSION['cCode']));

header("Location: order_comp.php");
exit();
