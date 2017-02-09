<?php

    $msg_body = '';
    
    try{
        $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
        $user = 'shopadmin';
        $password ='AdminPassword';
        $dbh = new PDO($dsn,$user,$password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'SELECT code,name,price FROM shop_product';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        $msg_body.='商品一覧<br><br>';
        
        $msg_body.='<form method = "post" action = "product_branch.php">';
        
        while(true){
            $rec = $stmt-> fetch(PDO::FETCH_ASSOC);
            if ($rec == false){
                break;
            }
            $msg_body.='<input type = "radio" name="pcode" value="'.$rec['code'].'">';
            $msg_body.=$rec['name'];
            $msg_body.='...';
            $msg_body.=$rec['price'];
            $msg_body.='円';
            $msg_body.='<br>';
        }
            
        $msg_body.='<input type = "submit" name ="disp" value = "表示">';
        $msg_body.='<input type = "submit" name ="add" value = "追加">';
        $msg_body.='<input type = "submit" name ="edit" value = "修正">';
        $msg_body.='<input type = "submit" name ="delete" value = "削除">';
        $msg_body.='</form>';
        
        $dbh = null;
    } catch (Exception $e) {
        printHeader();
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        printFooter();
        exit();
    }
    
    /**
     * 画面表示処理
     */
    printHeader();
    print $msg_body;
    printFooter();


    /**
     *
     * 画面表示処理を以下にまとめる
     */
     
    /**
     * Name: printHeader
     * Note: HTMLヘッダ情報表示
     * 
     * @auther  isamu.koseda@gmail.com
     * @param   non
     * @return  void
     */
    function printHeader() {
        print '<!DOCTYPE html>';
        print '<html>';
        print '   <head>';
        print '    <meta charset = "UTF-8">';
        print '    <title>まるまるショップ</title>';
        print '    </head>';
        print '    <body>';
    }
    
    /**
     * Name: printFooter
     * Note: HTMLフッター情報表示
     * 
     * @auther  isamu.koseda@gmail.com
     * @return  void
     */
    function printFooter() {
        print '    <br>';
        print '    </body>';
        print '</html>';
    }

?>
