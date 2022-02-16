<?php
session_start();
$_SESSION['gID'] = $_REQUEST['gID'];
$_SESSION['qty'] = $_REQUEST['qty'];
if(isset($_SESSION['cCode'])){
    header('Location: add_cart.php');
    exit();
}else{
    header('Location: login.php');
    exit();
}