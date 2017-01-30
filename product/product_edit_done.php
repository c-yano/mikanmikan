<!DOCTYPE html>
<HTML>
<HEAD>
    <META charset = 'UTF-8'>
    <TITLE> まるまるショップ</TITLE>
</HEAD>
<BODY>


<?php
try {
    $pcode = $_POST['pcode'];
    $pro_name = $_POST['name'];
    $pro_price = $_POST['price'];
    $pro_gazou_name_old =$_POST['gazou_name_old'];
    $pro_gazou_name = $_POST['gazou_name'];
    
    var_dump($_POST);
    
    $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
    $user = 'shopadmin';
    $password = 'AdminPassword';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'UPDATE shop_product SET name = :name, price = :price, gazou = :gazou_name WHERE code = :pcode';
    /* SQLを実行する前にあらかじめそこに入れる値を用意しておく */
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':name', $pro_name, PDO::PARAM_STR);
    $stmt->bindValue(':price', $pro_price, PDO::PARAM_INT);
    $stmt->bindValue(':pcode', $pcode, PDO::PARAM_INT);
    $stmt->bindParam(':gazou_name', $pro_gazou_name, PDO::PARAM_STR);
    /* 準備したprepareに入っているSQL文を実行*/
    $stmt->execute();
    
    $dbh = null;
    
    print '商品名：';
    print $pro_name;
    print '<br>';
    print '値段：';
    print $pro_price;
    print '<br>';


    if($pro_gazou_name_old != $pro_gazou_name){
        if($pro_gazou_name_old != ""){ 
            unlink("./gazou/".$pro_gazou_name_old);
        }
    }
    

   }catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    echo "The exception was created on line: " . $e->getLine();
    exit();
}
 
?>

<A href = "product_list.php">戻る</A>

</BODY>

</HTML>
