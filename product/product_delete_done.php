<!DOCTYPE html>
<HTML>
<HEAD>
	<META charset="UTF-8">
	<TITLE>まるまるショップ</TITLE>
</HEAD>
<BODY>

	<?php
	  var_dump($_GET);
	try{
        $pcode = $_GET['pcode'];
        $pro_gazou_name_old =$_GET['gazou_name_old'];
    
	    $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
    	$user = 'shopadmin';
    	$password = 'AdminPassword';
    	$dbh = new PDO($dsn, $user, $password);
    	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	
    	$sql = "DELETE FROM shop_product WHERE code = $pcode";
    	$stmt = $dbh->prepare($sql);
        $stmt->execute();
        
    	$dbh = null;
    	
    	if ($pro_gazou_name_old != $pro_gazou_name){
        	if($pro_gazou_name_old != " ") {
            unlink("./gazou/".$pro_gazou_name_old);
        	}
    	}
    	  
	    print'選択した商品を削除しました。<BR>';
    	
	}catch (Exception $e){
		print'ただいま障害により大変ご迷惑をお掛けしております。';
		exit();
    	}
	?>

	<A href = "product_list.php">戻る</A>

</BODY>

</HTML>


