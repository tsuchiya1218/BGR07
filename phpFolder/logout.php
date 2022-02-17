<?php
session_start();
$motourl = $_SERVER['HTTP_REFERER'];
unset($_SESSION['cCode']);
unset($_SESSION['cName']);
header("Location: $motourl");
exit();