<?php
    require_once('../common/common.php');
    printShopHtmlHeader();

#<!DOCTYPE html>
#<HTML>
#<HEAD>
#	<META charset="UTF-8">
#	<TITLE>まるまるショップ</TITLE>
#</HEAD>
#<BODY>

#	<?php
	try{
        $pcode = $_GET['pcode'];
        
        require_once('../common/common.php');
    	$dbh = connectShopTable();    
    
	    #$dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
    	#$user = 'shopadmin';
    	#$password = 'AdminPassword';
    	#$dbh = new PDO($dsn, $user, $password);
    	#$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	
    	$sql = "SELECT name,price,gazou FROM shop_product WHERE code = ?";
    	$stmt = $dbh->prepare($sql);
    	$data[] = $pcode;
        $stmt->execute($data);
        
          while(true){
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($rec == false){
            break;
            }
            $pro_name = $rec['name'];                                          // nameカラムの内容を変数$pro_nameへ代入する
            $pro_price = $rec['price'];                                         // priceカラムの内容を変数$pro_priceへ代入する
            $pro_gazou_name = $rec['gazou'];                                    // gazouカラムの内容を変数$pro_gazou_nameへ代入する
        //    var_dump($pro_name);
        //    print "mikan1".$pro_name."<br>";
           
          
        }
  
    	$dbh = null;  
    	 print "mikan".$pro_name."<br>";
        // 画像が設定されている場合には、$disp_gazouにHTMLコードを設定する
            /*
             * Q7. 変数$pro_gazou_nameが設定されているかチェックします
             */
            if(!isset($pro_gazou_name)) {
                $disp_gazou = '';
            } else {
                $disp_gazou = '<img src="../gazou/'.$pro_gazou_name.'">';
            }
            
            //var_dump($disp_gazou);
        
        
		
	}catch (Exception $e){
		print'ただいま障害により大変ご迷惑をお掛けしております。';
		exit();
	}
	?>
         <!-- 前のページ(商品一覧）に戻るボタンを表示する -->
         <!-- 商品参照フォームの本文 -->
        商品情報参照<br>
        <br>
        商品コード<br>
        <?php print $pcode; ?>
        <br>
        商品名<br>
        <?php print $pro_name; ?>
        <br>
        価格<br>
        <?php print $pro_price; ?>円
        <br>
        <?php print $disp_gazou; ?>
        <br>
       
        <form>
            <input type="button" onclick="history.back()" value="戻る">
        </form>
<?php
    printShopHtmlFooter();
?>
    <!-- /body>
</html -->
