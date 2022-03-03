<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
require_once "./common/db_connect.php";

$name = $_SESSION['name'];
$zipcode = $_SESSION['zipcode'];
$address1 = $_SESSION['address1'];
$address2 = $_SESSION['address2'];
$tel = $_SESSION['tel'];
$email = $_SESSION['email'];
$pass = $_SESSION['pass'];

$sql = "INSERT INTO Customers
        (CustomersName, CustomersZip, CustomersAddress1, CustomersAddress2, CustomersPhone, CustomersEmail, CustomersPass)
        VALUES(?,?,?,?,?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($name, $zipcode, $address1, $address2, $tel, $email, $pass));
