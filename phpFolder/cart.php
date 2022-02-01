<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
?>

<!-- 商品表示 -->
<p>！カートの中身を表示！</p>
<p>！ログインしていなかった場合はログインページに遷移！</p>
<table border='1'>
    <tr>
        <th>商品名</th>
        <th>単価</th>
        <th>個数</th>
        <th>金額</th>
        <th></th>
    </tr>
    <tr>
        <td>ダミー</td>
        <td align=right>&yen;1,100</td>
        <td align=right>
            <form method="POST" action="">
                <input type="hidden" name="id" value=ダミー>
                <input type="hidden" name="gname" value=ダミー>
                <select name="ChangeAmount">
                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        if ($i != $rec['CartAmount']) {
                            echo "            <option align = right value=$i>{$i}個</option>\n";
                        } else {
                            echo "            <option align = right value=$i selected>{$i}個</option>\n";
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="変更">
            </form>
        </td>
        <td align=right>&yen1,100</td>
        <td><a href="">削除</a>
        </td>
    </tr>
    <table>
        <tr>
            <td>商品を注文するには右のボタンをクリックして注文ページに進んでください。</td>
            <td>
                <input type="button" value="商品を注文する" onClick="document.location='./order_address.php'">
            </td>
        </tr>
        <tr>
            <td>
                買い物カゴを空にするには右のボタンをクリックしてください。
            </td>
            <td>
                <form method="POST" action="">
                    <input type="submit" value="買い物カゴを空にする">
                </form>
            </td>
        </tr>
    </table>

    <?php
    require "./common/footer.php"
    ?>