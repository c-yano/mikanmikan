<?php
   
    session_start();
    session_regenerate_id(true);
    
    require_once('../common/common.php');
    printShopHtmlHeader();
    printShopMemberName();
    
    var_dump($_SESSION);
?>
	<!-- 商品追加フォームの本文 -->
	お客様情報を入力してください<BR><BR>

	<!-- formタグでsubmitした先をprduct_add_check.php（商品追加チェック）に指定する -->
	<FORM method="post" action="shop_form_check.php" enctype="multipart/form-data">

		<!-- 商品名と価格をinputタグのtextフィールドに入力する -->
		お名前<BR> 
		<INPUT type="text" name="onamae" style="width:300px"/><BR>
		メールアドレス<BR>
		<INPUT type="text" name="mail" style="width:300px"/><BR>
		<BR>
		郵便番号<BR>
		<INPUT type="text" name="mailnum1" style="width:50px"/>
		-
		<INPUT type="text" name="mailnum2" style="width:100px"/>
		<BR>
		<br>
		住所<BR>
		<INPUT type="text" name="address" style="width:300px"/><BR>
		<BR>	
		電話番号<BR>
		<INPUT type="text" name="tel" style="width:300px"/><BR>
		<BR>	
　　　　<br>

		<!-- 戻るボタンとSubmitボタンを配置 -->
		<INPUT type="button" onclick="history.back()" value="戻る">
		<INPUT type="submit" value="OK">
		
		</style>
	</FORM>
	
</BODY>
</HTML>
    