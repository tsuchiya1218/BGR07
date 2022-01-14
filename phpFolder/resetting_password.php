<?php
$page_title = 'パスワード再設定';
require "./common/header.php";
?>
<p>パスワード再設定</p>
<hr>
<p>登録に使用したメールアドレスを入力し、「メール送信」ボタンを押してください。</p>
<table>
    <form method="POST" action="">
        <tr>
            <td align="right" valign="top">メールアドレス：</td>
            <td>
                <input type="email" size="40" name="email" value="" placeholder="例:denshi@nichiden.com">
                <?php
                if (isset($_SESSION['eMsg']['email'])) {
                    echo '<br>' . $_SESSION['eMsg']['email'];
                    unset($_SESSION['eMsg']['email']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="メール送信">
            </td>
        </tr>
    </form>
</table>
<?php
require "./common/footer.php";
?>