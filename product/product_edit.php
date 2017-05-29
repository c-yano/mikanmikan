<?php
    require_once('../common/common.php');
    printShopHtmlHeader();

#<!DOCTYPE html>
#<html>
#    <head>
#        <meta charset="UTF-8">
#        <title>まるまるショップ</title>
#    </head>
#    <body>
#        <?php
        try {
            
            $pcode = $_GET['pcode'];    
            
            require_once('../common/common.php');
    	    $dbh = connectShopTable();
    	    
            #$dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
            #$user = 'shopadmin';
            #$password = 'AdminPassword';
            #$dbh = new PDO($dsn, $user, $password);
            #$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = 'SELECT name,price,gazou FROM shop_product WHERE code=?';
            $stmt = $dbh->prepare($sql);      
            $data[] = $pcode;
            $stmt->execute($data);         
 
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $pro_name = $rec['name'];        
            $pro_price = $rec['price'];    
            $pro_gazou_name_old = $rec['gazou'];

            $dbh = null;
        
            if ($pro_gazou_name_old == ' '){
                $disp_gazou = '';
            } else {
                $disp_gazou = '<img src="../gazou/'.$pro_gazou_name_old.'">';
            }
        } catch (Exception $e) {
            print'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
        
?>
        
        商品修正<br>
        <br>
        商品コード<br>
        <?php print $pcode; ?>
        <br>
        <br>
        
        <form method="post" action="product_edit_check.php" enctype="multipart/form-data">
        
        <input type="hidden" name="pcode" value="<?php print $pcode; ?>">
        <input type="hidden" name="gazou_name_old" value="<?php print $pro_gazou_name_old; ?>">
        
        商品名<br>
        <input type="text" name="name" style="width:200px" value="<?php print $pro_name; ?>"><br>
        
        価格<br>
        <input type="text" name="price" style="width:50px" value="<?php print $pro_price; ?>">円<br>
        <br>
        
        画像<br>
        <input type ="file" name="gazou" style="width:400px"><br>
        
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
        </form>

<?php      
    printShopHtmlFooter();
?>
    <!-- /body>
</html -->