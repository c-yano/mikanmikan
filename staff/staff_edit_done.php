<!DOCTYPE html>
<HTML>
<HEAD>
    <META charset = 'UTF-8'>
    <TITLE> スタッフ</TITLE>
</HEAD>
<BODY>


<?php
try {
    $staffcode = $_POST['staffcode'];
    $staff_name = $_POST['name'];
    $staff_pass = $_POST['password'];
  
    #var_dump($_POST);
    
    $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
    $user = 'shopadmin';
    $password = 'AdminPassword';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'UPDATE shop_staff SET name = :name, password = :password WHERE code = :staffcode';
    /* SQLを実行する前にあらかじめそこに入れる値を用意しておく */
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':name', $staff_name, PDO::PARAM_STR);
    $stmt->bindParam(':passworde', $staff_pass, PDO::PARAM_STR);
    /*$stmt->bindValue(':staffcode', $staffcode, PDO::PARAM_INT); */

    /* 準備したprepareに入っているSQL文を実行*/
    $stmt->execute();
    
    $dbh = null;
    
    print 'スタッフ名：';
    print $staff_name;
    /*print '<br>';*/

   }catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    echo "The exception was created on line: " . $e->getLine();
    exit();
}
 
?>

<A href = "staff_list.php">戻る</A>

</BODY>

</HTML>
