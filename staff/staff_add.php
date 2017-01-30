<!DOCTYPE html>
<HTML>
<HEAD>
	<META charset="UTF-8">
	<TITLE>スタッフ</TITLE>
</HEAD>
<BODY>
	スタッフ追加<BR><BR>

	<FORM method="post" action="staff_add_check.php" >

		<!-- 商品名と価格をinputタグのtextフィールドに入力する -->
		ユーザＩＤを入力してください。<BR> 
		<INPUT type="text" name="name" style="width:200px"/><BR>
		パスワードを入力してください。<BR>
		<input type = "password" name = "pass" style = "width:100px"/><br>
		<BR>
		パスワードをもう一度入力ください。<br>
		<input type = "password" name = "pass2" style = "width:100px"/><br>
		<br>

		<!-- 戻るボタンとSubmitボタンを配置 -->
		<INPUT type="button" onclick="history.back()" value="戻る">
		<INPUT type="submit" value="OK">
		</style>
	</FORM>

</BODY>
</HTML>
