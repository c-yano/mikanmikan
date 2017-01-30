<!DOCTYPE html>
<HTML>
<HEAD>
	<META charset="UTF-8">
	<TITLE>まるまるショップ</TITLE>
</HEAD>
<BODY>
	
	<!-- 商品追加フォームの本文 -->
	商品追加<BR><BR>

	<!-- formタグでsubmitした先をprduct_add_check.php（商品追加チェック）に指定する -->
	<FORM method="post" action="product_add_check.php" enctype="multipart/form-data">

		<!-- 商品名と価格をinputタグのtextフィールドに入力する -->
		商品名を入力してください。<BR> 
		<INPUT type="text" name="name" style="width:200px"/><BR>
		価格を入力してください。<BR>
		<INPUT type="text" name="price" style="width:50px"/><BR>
		<BR>
	
		画像を選んでください。<BR/>
		<input type="file" name="gazou" style="width:400px"><br>
	<br>

		<!-- 戻るボタンとSubmitボタンを配置 -->
		<INPUT type="button" onclick="history.back()" value="戻る">
		<INPUT type="submit" value="OK">
		
		</style>
	</FORM>

	
	
</BODY>
</HTML>
