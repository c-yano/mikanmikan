<!DOCTYPE html>
<HTML>
<HEAD>
    <META charset = 'UTF-8'>
    <TITLE> まるまるショップ</TITLE>
</HEAD>
<BODY>


<?php
try {
    $pro_name = $_POST['name'];
    $pro_price = $_POST['price'];
    $pro_gazou_neme = $_POST['gazou_name'];
    
    $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
    $user = 'shopadmin';
    $password = 'AdminPassword';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'INSERT INTO shop_product(name,price,gazou) VALUES (?,?,?)';
    $stmt = $dbh -> prepare($sql);
    $data[] = $pro_name;
    $data[] = $pro_price;
    $data[] = $pro_gazou_neme;
    $stmt -> execute($data);
    // disconnect MySQL
    $dbh = null;
    
    print $pro_name;
    print'を追加しました。<BR>';
    
    
} catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}

?>

<A href = "product_list.php">戻る</A>

</BODY>

</HTML>
