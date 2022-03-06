<?php
//このページの前後に、住所変更ページに遷移する旨、住所を変更する旨を確認するポップアップ
session_start();
//DBの接続部分を読み込む
?>

以下に新しく登録する住所を入力してください

<form action="change_address_popup.php" method="post">
    <table>
        <tr>
            <td align="right" valign="top">郵便番号：</td>
            <td>
                <input type="text" size="20" maxlength="7" name="zip" value="<?php if (isset($_SESSION['val']['zip'])) {
                                                                                    echo $_SESSION['val']['zip'];
                                                                                } ?>" placeholder="例:1690073(ハイフンなし)" maxlength="7">
                <?php
                if (isset($_SESSION['eMsg']['zip'])) {
                    echo '<br>' . $_SESSION['eMsg']['zip'];
                    unset($_SESSION['eMsg']['zip']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">都道府県・市区町村：</td>
            <td>
                <input type="text" size="30" name="address1" value="<?php if (isset($_SESSION['val']['address1'])) {
                                                                        echo $_SESSION['val']['address1'];
                                                                    } ?>" placeholder="例:東京都新宿区">
                <?php
                if (isset($_SESSION['eMsg']['address1'])) {
                    echo '<br>' . $_SESSION['eMsg']['address1'];
                    unset($_SESSION['eMsg']['address1']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">町名・番地以下・建物名：</td>
            <td>
                <input type="text" size="30" name="address2" value="<?php if (isset($_SESSION['val']['address2'])) {
                                                                        echo $_SESSION['val']['address2'];
                                                                    } ?>" placeholder="例:百人町1-25-4 日本電子ビル 6F 161号室">
                <?php
                if (isset($_SESSION['eMsg']['address2'])) {
                    echo '<br>' . $_SESSION['eMsg']['address2'];
                    unset($_SESSION['eMsg']['address2']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="変更する">
            </td>
        </tr>
    </table>
</form>
<?php

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
    echo '<input type="button" onClick="document.location=\'./order_address.php\'" value="戻る">';
}

if (isset($_SESSION['val'])) {
    unset($_SESSION['val']);
}
?>