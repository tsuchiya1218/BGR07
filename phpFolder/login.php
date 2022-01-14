<?php
$page_title = 'ログインページ';
require "./common/header.php";
?>

<div style="text-align:center">
    <a href="./index.php"><img src="./img/Banner.png" width="500" height="150"></a>
</div>

<p>メールアドレス・パスワードを入力してください。</p>
<table>
    <form method="POST" action="">
        <tr>
            <td align="right">メールアドレス：</td>
            <td>
                <input type="text" name="mailaddress" value="">
            </td>
        </tr>
        <tr>
            <td align="right">パスワード：</td>
            <td>
                <input type="password" name="pass" value="">
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" value="初めての方はこちらから" onClick="document.location='./register_customer.php'">
            </td>
            <td>
                <input type="submit" value="ログイン">
            </td>
        </tr>
    </form>
</table>
<input type="button" value="パスワードを忘れた" onClick="document.location='./resetting_password.php'">
<?php
require "./common/footer.php";
?>