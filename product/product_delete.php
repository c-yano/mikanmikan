<!DOCTYPE html>
<HTML>
<HEAD>
	<META charset="UTF-8">
	<TITLE>まるまるショップ</TITLE>
</HEAD>
<BODY>

	<?php
	        
	try{
      $pcode = $_GET['pcode'];
    
	    $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
    	$user = 'shopadmin';
    	$password = 'AdminPassword';
    	$dbh = new PDO($dsn, $user, $password);
    	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$sql = "SELECT name,price,gazou FROM shop_product WHERE code = $pcode";
    	$stmt = $dbh->prepare($sql);
        $stmt->execute();
 
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $pro_name = $rec['name'];        
        $pro_price = $rec['price'];    
        $pro_gazou_name_old = $rec['gazou'];
          
    	$dbh = null;  	
	     
	}catch (Exception $e){
		print'削除する商品を選択してください。';
		exit();
	}
	    print '選択した商品を削除します。<br>';
        print '<form method="get" action = "product_delete_done.php">';
        print '<input type = "hidden" name = "pcode" value = "'.$pcode.'"/>';
        print '<input type = "hidden" name = "gazou_name_old" value = "'.$pro_gazou_name_old.'"/>';
        print '<br>';
        print '<input type = "button" onclick = "history.back()" value = "戻る"/>';
        print '<input type = "submit" value = "OK"/>';
        print '</form>';
	?>

</BODY>

</HTML>





