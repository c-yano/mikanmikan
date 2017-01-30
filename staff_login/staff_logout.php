<!DOCTYPE html>
<HTML>
<HEAD>
    <META charset="UTF-8">
    <TITLE>スタッフ</TITLE>
</HEAD>
<BODY>
    <?php
    session_start();
    $_SESSION = array();
    if(isset($_COOKIE[session_name()]) == true) {
    setcookie(session_name(), '', time() - 42000, '/');
    }    
    session_destroy();
    print 'ログアウトしました<br>';
    ?>
    
    <A href = "staff_login.html">戻る</A>
</BODY>
</HTML>