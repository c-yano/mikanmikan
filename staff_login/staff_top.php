<!DOCTYPE html>
<HTML>
<HEAD>
    <META charset="UTF-8">
    <TITLE>スタッフ</TITLE>
</HEAD>
<BODY>
    <?php
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['login']) == false){
    print 'ログインされていません。<br>';
    print '<a href="./staff_login.html">ログイン画面へ</a>';
    exit();
    } else {
        print $_SESSION['staff_name'];
        print 'さんログイン中<br>';
        print '<br>';
    }
    ?>
    <A href = "staff_logout.php">ログアウト</A>
    <A href = "staff_login.html">戻る</A>
</BODY>
</HTML>