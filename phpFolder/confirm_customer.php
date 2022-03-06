<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
require_once "./common/db_connect.php";

$sql = "INSERT INTO Customers
        (CustomersCode, CustomersName, CustomersZip, CustomersAddress1, CustomersAddress2, CustomersPhone, CustomersEmail, CustomersPass)
        VALUES(100,?,?,?,?,?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($_SESSION['confirm']['name'], $_SESSION['confirm']['zipcode'], 
                $_SESSION['confirm']['address1'], $_SESSION['confirm']['address2'], 
                $_SESSION['confirm']['tel'], $_SESSION['confirm']['email'], $_SESSION['confirm']['pass']));

require "./common/footer.php";
