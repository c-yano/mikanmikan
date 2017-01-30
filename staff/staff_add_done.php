<!DOCTYPE html>
<HTML>
<HEAD>
    <META charset = 'UTF-8'>
    <TITLE> スタッフ</TITLE>
</HEAD>
<BODY>


<?php
try {
    $staff_name = $_POST['name'];
    $staff_pass = $_POST['pass'];
    
    $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
    $user = 'shopadmin';
    $password = 'AdminPassword';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'INSERT INTO shop_staff(name,password) VALUES (?,?)';
    $stmt = $dbh -> prepare($sql);
    $data[] = $staff_name;
    $data[] = $staff_pass;
    $stmt -> execute($data);
    // disconnect MySQL
    $dbh = null;
    
    print $staff_name;
    print'さんを追加しました。<BR>';
    
    
} catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}

?>

<A href = "staff_list.php">戻る</A>

</BODY>

</HTML>
