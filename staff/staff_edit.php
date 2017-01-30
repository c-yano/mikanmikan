<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>スタッフ</title>
    </head>
    <body>
        <?php
        try {
            
            $staffcode = $_GET['staffcode'];    
            
            $dsn = 'mysql:dbname=Shop;host=localhost;charset=utf8';
            $user = 'shopadmin';
            $password = 'AdminPassword';
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = 'SELECT name FROM shop_staff WHERE code=?';
            $stmt = $dbh->prepare($sql);      
            $data[] = $staffcode;
            $stmt->execute($data);         
 
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $staff_name = $rec['name'];        
            
            $dbh = null;
        
          
        } catch (Exception $e) {
            print'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }
        
        ?>
        
        スタッフ修正<br>
        <br>
        スタッフID<br>
        <?php print $staffcode; ?>
        <br>
        <br>
        スタッフを修正します<br><br>
        
        <form method="post" action="staff_edit_check.php" enctype="multipart/form-data">
        
        <input type="hidden" name="staffcode" value="<?php print $staffcode; ?>">
        スタッフ名<br>
        <input type="text" name="name" style="width:200px" value="<?php print $staff_name; ?>"><br>
        パスワードを入力してください。<BR>
		<input type = "password" name = "pass" style = "width:100px"/><br>
		<BR>
		パスワードをもう一度入力ください。<br>
		<input type = "password" name = "pass2" style = "width:100px"/><br>
		<br>
        <input type="button" onclick="hidden.back()" value="戻る">
        <input type="submit" value="OK">
        </form>
        

    </body>
</html>