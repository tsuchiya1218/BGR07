<?php
try {
    $server_name="10.42.129.3";
    $db_name="20jy0103 ";

    $user_name="20jy0103";
    $user_pass="20jy0103";

    $dsn = "sqlsrv:server=$server_name;database=$db_name";

    $pdo = new PDO($dsn,$user_name,$user_pass);

    $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}   catch(PDOException $e) {
    print "接続エラー！:".$e->getMessage();
    exit();
}
$sql = "SELECT category_id,category_name FROM book_category";
try{
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $array = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $stmt = null;
    $pdo = null;
} catch(PDOException $e){
    print "SQL実行エラー！".$e->getMessage();
    exit();
}

?>