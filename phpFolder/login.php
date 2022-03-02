<?php
session_start();
require "./common/header.php";
?>

<div style="text-align:center">
    <a href="./index.php"><img src="./img/Banner.png" width="500" height="150"></a>
</div>

<p>メールアドレス・パスワードを入力してください。</p>
<table>
    <form method="POST" action="./check_login.php">
        <tr>
            <td align="right">メールアドレス：</td>
            <td>
                <input type="text" name="mail">
            </td>
        </tr>
        <tr>
            <td align="right">パスワード：</td>
            <td>
                <input type="password" name="pass">
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
        <tr>
            <td>
                <?php
                if (isset($_SESSION['eMsg'])) {
                    echo $_SESSION['eMsg'];
                    unset($_SESSION['eMsg']);
                }
                ?>
            </td>
        </tr>
    </form>
</table>
<input type="button" value="パスワードを忘れた" onClick="document.location='./resetting_password.php'">
<?php
require "./common/footer.php";
?>