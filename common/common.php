<?php
    function printShopHtmlHeader() {
        
        print '<!DOCTYPE html>'.PHP_EOL;
        print '<html>'.PHP_EOL;
        print ' <head>'.PHP_EOL;
        print '  <meta charset="UTF-8">'.PHP_EOL;
        print '  <title>まるまるショップ</title>'.PHP_EOL;
        print ' </head>'.PHP_EOL;
        print ' <body>'.PHP_EOL;
    }
    
    function printShopHrmlFooter() {
        print '</html>'.PHP_EOL;
    }
    
    function printShopMemberName() {
        if (isset($_SESSION['member_login']) == false) {
        print 'ようこそゲスト様　';
            print '<br>'.PHP_EOL;
        }        
    }
        
    function connectDB($dbname, $hostname, $user, $password) {
        $dsn = "mysql:dbname=$dbname;host=$hostname;charset=utf8";
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $dbh;
    }

    function connectStaffTable() {
        
        // MySQLに接続する
        $dbname = "Shop";
        $hostname = "localhost";
        $user = "shopadmin";
        $password = "AdminPassword";
        $dbh = connectDB($dbname, $hostname, $user, $password);
    
        return $dbh;
    }
    function connectShopTable() {
        
        // MySQLに接続する
        $dbname = "Shop";
        $hostname = "localhost";
        $user = "shopadmin";
        $password = "AdminPassword";
        $dbh = connectDB($dbname, $hostname, $user, $password);
    
        return $dbh;
    }

    function sessionCheck() {
        // セッションの開始
        session_start();
        session_regenerate_id(true);
        
        // var_dump($_SESSION);
    
        // ログイン状況のチェックを実施
        if (isset($_SESSION['login']) == false) {
            print 'ログインされていません。<br>';
            print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
            exit();
        } else {
            print $_SESSION['staff_name'];
            print 'さんログイン中<br>';
            print '<br>';
        }
    }


?>
