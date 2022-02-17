<?php
session_start();
$motourl = $_SERVER['HTTP_REFERER'];
if(isset($_POST['handGID'])){
    $_SESSION['handGID'] = $_POST['handGID'];    
}
if(isset($_POST['handGID'])){
    $_SESSION['handQty'] = $_POST['handQty'];    
}

if(isset($_SESSION['cCode'])){
    header('Location: add_cart.php');
    exit();
}else{
    $_SESSION['motourl'] = $_SERVER['REQUEST_URI'];
    header('Location: login.php');
    exit();
}