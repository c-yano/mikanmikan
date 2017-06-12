<!DOCTYPE html>
<HTML>
<HEAD>
    <META charset="UTF-8">
    <TITLE>スタッフ</TITLE>
</HEAD>
<BODY>
    <?php
    //var_dump($_POST);
    $staffcode=$_POST['staffcode'];
    $staff_name=$_POST['name'];
    $staff_pass = $_POST['pass'];
    
      
    if($staffcode ==""){
        print 'コードが入力されていません。<br>';
    } else {
        print 'コード:';
        print $staffcode;
        print '<br>';
    }  
    
    if($staff_name ==""){
        print 'スタッフ名が入力されていません。<br>';
    } else {
        print 'スタッフ:';
        print $staff_name;
        print '<br>';
    }
    
    if($staff_pass ==""){
        print 'パスワード入力されていません。<br>';
    } else {
        $staff_pass = md5($staff_pass); 
        print 'パスワード:';
        print $staff_pass;
        print '<br>';
    }    

        
    if ($staff_name == ""|| $staff_pass == "" ) {
        print '<form>';
        print '<input type = "button" onclick="history.back()" value="戻る"/>';
        print '</form>';
    } else {
        print '上記のスタッフに編集します。<br>';
        print '<form method="post" action = "staff_edit_done.php">';
        
        print '<input type = "hidden" name = "staffcode" value = "'.$staffcode.'"/>';
        print '<input type = "hidden" name = "name" value = "'.$staff_name.'"/>';
        print '<input type = "hidden" name = "pass" value = "'.$staff_pass.'"/>';
        print '<br>';
        print '<input type = "button" onclick = "history.back()" value = "戻る"/>';
        print '<input type = "submit" value = "OK"/>';
        print '</form>';
        }
?>
</BODY>
</HTML>
