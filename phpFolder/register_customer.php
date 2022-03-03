<?php
session_start();
//DBの接続部分を読み込む
require "./common/header.php";
require_once "./common/db_connect.php";
?>
<div style="text-align:center">
    <a href="./index.php"><img src="./img/Banner.png" width="500" height="150"></a>
</div>
<p>お客様の情報を入力してください。</p>
<hr>
<p>以下のフォームにデータを入力し、「次へ>>」ボタンを押してください。</p>
<p>*が付いている項目は必須項目です</p>
<table>
    <form method="POST" action="check_register.php">
        <tr>
            <td align="right" valign="top">*お名前：</td>
            <td>
                <input type="text" size="20" name="name" value="" placeholder="例:日本 電子" maxlength="30">
                <?php
                if (isset($_SESSION['eMsg']['name'])) {
                    echo '<br>' . $_SESSION['eMsg']['name'];
                    unset($_SESSION['eMsg']['name']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">*郵便番号：</td>
            <td>
                <input type="text" size="60" name="zipcode" value="" placeholder="111-1111">
                <?php
                if (isset($_SESSION['eMsg']['zipcode'])) {
                    echo '<br>' . $_SESSION['eMsg']['zipcode'];
                    unset($_SESSION['eMsg']['zipcode']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">*都道府県市区町村：</td>
            <td>
                <input type="text" size="60" name="address1" value="" placeholder="例:東京都新宿区">
                <?php
                if (isset($_SESSION['eMsg']['address1'])) {
                    echo '<br>' . $_SESSION['eMsg']['address1'];
                    unset($_SESSION['eMsg']['address1']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">字名・番地：</td>
            <td>
                <input type="text" size="60" name="address2" value="" placeholder="例:1-25-4 日本電子ビル 6F 161号室">
                <?php
                if (isset($_SESSION['eMsg']['address2'])) {
                    echo '<br>' . $_SESSION['eMsg']['address2'];
                    unset($_SESSION['eMsg']['address2']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">電話番号：</td>
            <td>
                <input type="tel" size="20" name="tel" value="" placeholder="例:03-3369-xxxx" maxlength="20">
                <?php
                if (isset($_SESSION['eMsg']['tel'])) {
                    echo '<br>' . $_SESSION['eMsg']['tel'];
                    unset($_SESSION['eMsg']['tel']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">*メールアドレス：</td>
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
            <td align="right" valign="top">*パスワード（6文字以上）：</td>
            <td>
                <input type="password" name="pass" size="20" minlength="6" maxlength="20">
                <?php
                if (isset($_SESSION['eMsg']['pass'])) {
                    echo '<br>' . $_SESSION['eMsg']['pass'];
                    unset($_SESSION['eMsg']['pass']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">*パスワード（確認用）：</td>
            <td>
                <input type="password" name="pass2" size="20" minlength="6" maxlength="20">
                <?php
                if (isset($_SESSION['eMsg']['pass2'])) {
                    echo '<br>' . $_SESSION['eMsg']['pass2'];
                    unset($_SESSION['eMsg']['pass2']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <input type="submit" value="次へ>>">
            </td>
        </tr>
    </form>
</table>
<?php
unset($_SESSION['eMsg']);
?>
<?php
require "./common/footer.php";
?>