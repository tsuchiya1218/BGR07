<?php
session_start();
//DBの接続部分を読み込む
require "./common/header.php";
require_once "./common/db_connect.php";
?>
<div style="text-align:center">
    <a href="./index.php"><img src="./img/Banner.png" width="500" height="150"></a>
</div>
<p>
    この度はご利用ありがとうございます。<br>
    当サイトの会員登録していただくために必要なお客様の情報を入力してください。
</p>
<hr>
<p>以下のフォームにデータを入力し、「次へ>>」ボタンを押してください。</p>
<p>*が付いている項目は必須項目です</p>
<table>
    <form method="POST" action="check_register.php">
        <tr>
            <td align="right" valign="top">*お名前：</td>
            <td>
                <input type="text" size="20" name="name" value="<?php if (isset($_SESSION['val']['name'])) {
                                                                    echo $_SESSION['val']['name'];
                                                                } ?>" placeholder="例:日本 電子" maxlength="30">
                <?php
                if (isset($_SESSION['eMsg']['name'])) {
                    echo '<br><div class="message">' . $_SESSION['eMsg']['name'] . '</div';
                    unset($_SESSION['eMsg']['name']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">*郵便番号：</td>
            <td>
                <input type="text" size="60" name="zipcode" value="<?php if (isset($_SESSION['val']['zipcode'])) {
                                                                        echo $_SESSION['val']['zipcode'];
                                                                    } ?>" placeholder="例:1111111" maxlength="7">
                <?php
                if (isset($_SESSION['eMsg']['zipcode'])) {
                    echo '<br><div class="message">' . $_SESSION['eMsg']['zipcode'] . '</div>';
                    unset($_SESSION['eMsg']['zipcode']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">*都道府県市区町村：</td>
            <td>
                <input type="text" size="60" name="address1" value="<?php if (isset($_SESSION['val']['address1'])) {
                                                                        echo $_SESSION['val']['address1'];
                                                                    } ?>" placeholder="例:東京都新宿区">
                <?php
                if (isset($_SESSION['eMsg']['address1'])) {
                    echo '<br><div class="message">' . $_SESSION['eMsg']['address1'] . '</div>';
                    unset($_SESSION['eMsg']['address1']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">字名・番地：</td>
            <td>
                <input type="text" size="60" name="address2" value="<?php if (isset($_SESSION['val']['address2'])) {
                                                                        echo $_SESSION['val']['address2'];
                                                                    } ?>" placeholder="例:1-25-4 日本電子ビル 6F 161号室">
                <?php
                if (isset($_SESSION['eMsg']['address2'])) {
                    echo '<br><div class="message">' . $_SESSION['eMsg']['address2'] . '</div>';
                    unset($_SESSION['eMsg']['address2']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">電話番号：</td>
            <td>
                <input type="tel" size="20" name="tel" value="<?php if (isset($_SESSION['val']['tel'])) {
                                                                    echo $_SESSION['val']['tel'];
                                                                } ?>" placeholder="例:03-3369-xxxx" maxlength="20">
                <?php
                if (isset($_SESSION['eMsg']['tel'])) {
                    echo '<br><div class="message">' . $_SESSION['eMsg']['tel'] . '</div>';
                    unset($_SESSION['eMsg']['tel']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">*メールアドレス：</td>
            <td>
                <input type="email" size="40" name="email" value="<?php if (isset($_SESSION['val']['email'])) {
                                                                    echo $_SESSION['val']['email'];
                                                                } ?>" placeholder="例:denshi@nichiden.com">
                <?php
                if (isset($_SESSION['eMsg']['email'])) {
                    echo '<br><div class="message">' . $_SESSION['eMsg']['email'] . '</div>';
                    unset($_SESSION['eMsg']['email']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">*パスワード（8文字以上）：</td>
            <td>
                <input type="password" name="pass" size="8" minlength="8" maxlength="8">
                <?php
                if (isset($_SESSION['eMsg']['pass'])) {
                    echo '<br><div class="message">' . $_SESSION['eMsg']['pass'] . '</div>';
                    unset($_SESSION['eMsg']['pass']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">*パスワード（確認用）：</td>
            <td>
                <input type="password" name="pass2" size="8" minlength="8" maxlength="8">
                <?php
                if (isset($_SESSION['eMsg']['pass2'])) {
                    echo '<br><div class="message">' . $_SESSION['eMsg']['pass2'] . '</div>';
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
if (isset($_SESSION['val'])) {
    unset($_SESSION['val']);
}
?>
<?php
require "./common/footer.php";
?>