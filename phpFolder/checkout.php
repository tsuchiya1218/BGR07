<?php
session_start();
require "./common/header.php";
require "./common/banner.php";
?>

<script language="javascript">
	function check(){
		var form = document.form1;
		if(form.kessai[0].checked == true){
			form.action="daikinn.php";
		}
		else {
			form.action = "credit.php";
		}
		form.submit();
	}
</script>

<div style="text-align:center">

<h3>購入画面</h3>
<p>--------------------------------------</p>
<h4>決済方法</h4>
<form name="form1" method="POST">
    <input type="radio" name="kessai" checked>代金引き　
    <input type="radio" name="kessai">クレジットカード
    <p><a href = "javascript:check()"><img src="./img/check.png"></a></p>
</form>
<p>--------------------------------------</p>

</div>

<?php
require "./common/footer.php"
?>
