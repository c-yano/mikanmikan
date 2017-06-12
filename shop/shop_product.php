<?php

session_start();
session_regenerate_id(true);

require_once('../common/common.php');
printShopHtmlHeader();
printShopMemberName();

#var_dump($_GET);

try {
    $pcode = $_GET['pcode'];
    $dbh=connectShopTable('shop','localhost','shopadmin','adminadmin');
    //$dbh=connectDB('shop','localhost','shopadmin','adminadmin');
    
    $sql='SELECT name,price,gazou FROM shop_product WHERE code=?';
    $stmt=$dbh->prepare($sql);
    $data[]=$pcode;
    $stmt->execute($data);
    
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    $pro_name =$rec['name'];
    $pro_price =$rec['price'];
    $pro_gazou_name =$rec['gazou'];
    
    $dbh=null;
    
    if($pro_gazou_name == ''){
        $disp_gazou ='';
    } else {
        $disp_gazou = '<img src="../gazou/' .$pro_gazou_name. '">';
    }
    //print '<a herf="shop_cartin.php?pcode='. $pcode.'">カートに入れる</a><br>';
    //print '<form method="GET">';
    //print '<button type="submit" name="cartin" value='.$pcode.' formaction="shop_cartin.php">カートにいれる</button>'; 
    //print '</form>';
} catch(Exception $e) {
    print'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}
?>

    商品情報参照<br>
    <br> 
    商品コード<br>
    <?php print $pcode; ?>
    <br>
    商品名<br>
    <?php print $pro_name; ?>
    <br>
    価格<br>
    <?php print $pro_price; ?>
    <br>
    <?php print $disp_gazou; ?>
    <br>
    <br>
    <!-- <a herf="shop_cartin.php">カートに入れる</a><br> -->
    <form method="GET">
        <input type="button" onclick="history.back()" value="戻る">
        <?php
          print '<button type="submit" name="pcode" value='.$pcode.' formaction="shop_cartin.php">カートにいれる</button>'; 
        ?> 
    </form>
</body>
</html>    