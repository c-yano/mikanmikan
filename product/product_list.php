<!DOCTYPE html>
<html>
   <head>
    <meta charset = "UTF-8">
    <title>まるまるショップ</title>
    </head>
    <body>
    
    <?php

    try{
        $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
        $user = 'shopadmin';
        $password ='AdminPassword';
        $dbh = new PDO($dsn,$user,$password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'SELECT code,name,price FROM shop_product';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        print'商品一覧<br><br>';
        
        print'<form method = "post" action = "product_branch.php">';
        
        while(true){
            $rec = $stmt-> fetch(PDO::FETCH_ASSOC);
            if ($rec == false){
            break;
            }
            print '<input type = "radio" name="pcode" value="'.$rec['code'].'">';
            print $rec['name'].'...';
            print $rec['price'].'円';
            print '<br>';
        }
            
        print '<input type = "submit" name ="disp" value = "表示">';
        print '<input type = "submit" name ="add" value = "追加">';
        print '<input type = "submit" name ="edit" value = "修正">';
        print '<input type = "submit" name ="delete" value = "削除">';
        print '</form>';
        
        $dbh = null;
    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
    ?>
    <br>
    </body>
</html>