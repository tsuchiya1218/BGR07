<?php
session_start();
$gID = $_REQUEST['gID'];
$qty = $_REQUEST['qty'];

if(isset($_SESSION['userID'])){
    header('add_cart.php');
    exit();
}else{
    header('Location: login.php');
    exit();
}