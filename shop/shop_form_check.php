<?php
   
    session_start();
    session_regenerate_id(true);
    //unset(session_start);
    require_once('../common/common.php');
    printShopHtmlHeader();
    printShopMemberName();
    
    //var_dump($_SESSION);
    
    $onamae = filter_input(INPUT_POST,"onamae");
    $mail = filter_input(INPUT_POST,"mail");
    $mailnum1 = filter_input(INPUT_POST,"mailnum1");
    $mailnum2 = filter_input(INPUT_POST,"mailnum2");
    $address = filter_input(INPUT_POST,"address");
    $tel = filter_input(INPUT_POST,"tel");
    
    if($onamae ==""){
        print '名前が入力されていません。<br>';
    } 
    else{
        print 'お名前:';
        print $onamae;
        print '<br>';
    }
    if($mail ==""){
        print 'メールアドレスが入力されていません。<br>';
    } 
    else{
        print 'メールアドレス:';
        print $mail;
        print '<br>';
    }    
    if (preg_match('/^[0-9]+$/',$mailnum1) == 0) {
        print '郵便番号を正確に入力してください。<br>';
    }
    elseif (preg_match('/^[0-9]+$/',$mailnum2) == 0) {
        print '郵便番号を正確に入力してください。<br>';
    }
    else {
        print '郵便番号:';
        print $mailnum1;
        print '-';
        print $mailnum2;
        print '<br>';
    }
    if($address ==""){
        print '住所が入力されていません。<br>';
    } 
    else{
        print '住所:';
        print $address;
        print '<br>';
    } 
    if (preg_match('/^[0-9]+$/',$mailnum1) == 0) {
        print '電話番号を正確に入力してください。<br>';
    }
    else {
        print '電話番号:';
        print $tel;
        print '<br>';
    }
//    if ($onamae == ""|| $mail == ""|| preg_match('/^[0-9]+$/',$mailnum1) == 0 || preg_match('/^[0-9]+$/',$mailnum2) == 0 || $address == ""|| $tel == "") {
    if ($mail == ""|| preg_match('/^[0-9]+$/',$mailnum1) == 0 || preg_match('/^[0-9]+$/',$mailnum2) == 0 || $address == ""|| $tel == "") {    
        print '<form>';
        print '<input type = "button" onclick="history.back()" value="戻る"/>';
        print '</form>';
    } else {
        print 'お客様情報を追加します。<br>';
        print '<form method="post" action = "shop_form_done.php">';
        print '<input type = "hidden" name = "onamae" value = "'.$onamae.'"/>';
        print '<input type = "hidden" name = "mail" value = "'.$mail.'"/>';
        print '<input type ="hidden" name= "mailnum1" value ="'.$mailnum1.'">';
        print '<input type ="hidden" name= "mailnum2" value ="'.$mailnum2.'">';
        print '<input type ="hidden" name= "address" value ="'.$address.'">';
        print '<input type ="hidden" name= "tel" value ="'.$tel.'">';
        print '<br>';
        print '<input type = "button" onclick = "history.back()" value = "戻る"/>';
        print '<input type = "submit" value = "OK"/>';
        print '</form>';
        }
?>