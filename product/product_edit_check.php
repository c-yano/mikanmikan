<?php
    require_once('../common/common.php');
    printShopHtmlHeader();
    printShopHtmlFooter();
#<!DOCTYPE html>
#<HTML>
#<HEAD>
#    <META charset="UTF-8">
#    <TITLE>まるまるショップ</TITLE>
#</HEAD>
#<BODY>
#    <?php
    #var_dump($_POST);
    $pcode=$_POST['pcode'];
    $pro_name=$_POST['name'];
    $pro_price = $_POST['price'];
    $pro_gazou_name_old =$_POST['gazou_name_old'];
    $pro_gazou = $_FILES['gazou'];
    
      
    if($pcode ==""){
        print 'コードが入力されていません。<br>';
    } else {
        print 'コード:';
        print $pcode;
        print '<br>';
    }  
    
    if($pro_name ==""){
        print '商品名が入力されていません。<br>';
    } else {
        print '商品名:';
        print $pro_name;
        print '<br>';
    }
    
    if (preg_match('/^[0-9]+$/',$pro_price) == 0) {
        print '価格を正確に入力してください。<br>';
    } else {
        print '価格:';
        print $pro_price;
        print '円<br>';
    }
    
      if($pro_gazou['size'] > 0){
        if($pro_gazou['size'] > 1000000){
            print'画像が大きすぎます';
        } else {
            move_uploaded_file($pro_gazou['tmp_name'],'../gazou/'.$pro_gazou['name']);
            print'<img_src="../gazou/'.$pro_gazou['name'].'">';
            print'<br>';
        }
    }
        
    if ($pro_name == ""|| preg_match('/^[0-9]+$/',$pro_price) == 0 || $pro_gazou['size'] > 1000000 ) {
        print '<form>';
        print '<input type = "button" onclick="history.back()" value="戻る"/>';
        print '</form>';
    } else {
        print '上記の商品に編集します。<br>';
        print '<form method="post" action = "product_edit_done.php">';
        
        print '<input type = "hidden" name = "pcode" value = "'.$pcode.'"/>';
        print '<input type = "hidden" name = "name" value = "'.$pro_name.'"/>';
        print '<input type = "hidden" name = "price" value = "'.$pro_price.'"/>';
        print '<input type ="hidden" name="gazou_name" value ="'.$pro_gazou['name'].'">';
        print '<input type="hidden" name="gazou_name_old" value="'.$pro_gazou_name_old.'">';
        print '<br>';
        print '<input type = "button" onclick = "history.back()" value = "戻る"/>';
        print '<input type = "submit" value = "OK"/>';
        print '</form>';
        }
?>
<!-- /BODY>
</HTML -->
