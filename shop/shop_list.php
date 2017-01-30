<?php
    session_start();
    session_regenerate_id(ture);
    
    require_once('../common/common.php');
    
    printShopHtmlHeader();
    printShopMemberName();
    
    var_dump($_SESSION);
    
    try{
        $dbh = connectShopTable();
        $sql = 'SELECT code,name,price FROM shop_product';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $dbh = null;
        
        print '商品一覧<br><br>';
        
        while (true) {
            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
            if ($rec == false){
                break;
            }
            print '<a href="shop_product.php?pcode='.$rec['code'].'">';
            print $rec['name'].'...';
            print $rec['price'].'円';
            print '</a>';
            print '<br>';
        }
        print '<br>';
        //print '<a href="shop_cartlook.php">カートを見る</a><br>';
        print '<form method="GET" action = "shop_cartlook.php">';
        print '<button type="submit">カートを見る</button>'; 
        print '</form>';
        
    }catch(Exception $e) {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
?>

