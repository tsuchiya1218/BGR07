<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
?>
<p>
    お届け先は以下の住所でよろしいですか？<br>
    変更する場合は変更ボタンを<br>
    よろしければお支払方法の選択に進みます
</p>
<?php

    echo <<< EOM
    <table border='1'>
    <tr>
        <th>郵便番号</th>
        <th>都道府県・市区町村</th>
        <th>町名・番地以下・建物名</th>
        <th></th>
    </tr>\n
    EOM;

    $sql = "SELECT * FROM Customers WHERE CustomersCode = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($_SESSION['cCode']));
    $rec = $stmt->FETCH(PDO::FETCH_ASSOC);

    {
        echo "<tr><td class = >" . $rec['CustomersZip'] . "</td>";
        echo "<td class = >" . $rec['CustomersAddress1'] . "</td>";
        echo "<td class = >" . $rec['CustomersAddress2'] . "</td>";
        echo "<td><input type=\"button\" value=\"変更する\"></td></tr>\n";
        
    }
?>
</table>
<button type="button" onClick="history.back()">戻る</button>
<button type="button" onClick="document.location='./order_confirm.php'">お支払い手続きに進む</button>

<?php
require "./common/footer.php";
?>