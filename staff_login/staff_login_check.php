<!DOCTYPE html>
<HTML>
<HEAD>
    <META charset="UTF-8">
    <TITLE>スタッフ</TITLE>
</HEAD>
<BODY>
    <?php
    $staff_name = $_POST['name'];
    $staff_pass = $_POST['pass'];
    $staff_pass = md5($staff_pass);
    
    $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
    $user = 'shopadmin';
    $password = 'AdminPassword';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT code FROM shop_staff WHERE name=? AND password=?';
    $stmt =$dbh->prepare($sql);
    $data[]=$staff_name;
    $data[]=$staff_pass;
    $stmt->execute($data);
    
    $dbh = null;
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if($rec == false) {
    print 'スタッフ名かパスワードが間違っています。<br>';
    print '<a href="staff_login.html">戻る</a>';

    } else {
        session_start();
        $_SESSION['login'] = 1;
        $_SESSION['staff_code'] = $rec['code'];
        $_SESSION['staff_name'] = $staff_name;
        header('Location:staff_top.php');
        exit();
    }

    ?>

</body>

</html>