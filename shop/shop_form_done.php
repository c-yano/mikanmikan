<?php
   
    session_start();
    session_regenerate_id(true);
    
    require_once('../common/common.php');
    printShopHtmlHeader();
    //printShopMemberName();
    
    #var_dump($_SESSION);
    $onamae = filter_input(INPUT_POST,"onamae");
    print $onamae;
    print'様<br>';
    print '<br>';
    print 'このたびはご注文ありがとうございました。<br>';
    
    try{
        
        if (isset($_SESSION['cart']) == true) {
            $cart = $_SESSION['cart'];
            $kazu = $_SESSION['kazu'];
            $max = count($cart);
        } else{
            $max = 0;
        }
        if($max == 0){
            print 'カートに商品が入っていません<br>';
            print '<br>';
            print '<a href="shop_list.php">商品一覧へ戻る</a>';
            exit();
        }
        $dbh=connectShopTable('shop','localhost','shopadmin','adminadmin');
        
        foreach ($cart as $key=>$val) {
            $sql = 'SELECT code,name,price,gazou FROM shop_product WHERE code=?';
            $stmt = $dbh->prepare($sql);
            $data[0]=$val;
            $stmt->execute($data);
            
            $rec =$stmt->fetch(PDO::FETCH_ASSOC);
            $pro_name[] = $rec['name'];
            $pro_price[] = $rec['price'];
        }
        $dbh = null;
         
    }catch(Exception $e){
        print'ただいま障害により大変ご迷惑おかけしております。';
        exit();
    }
?>
    <br>
    ご注文商品<br>
    **************************<br>
    <br>
<?php
    for ($i=0; $i < $max; $i++) {
    print $pro_name[$i];
    print $pro_price[$i];
    print '円';
    print '×';
    print $kazu[$i];
    print '個';
    print '=';
    /*<td><input type="text" name ="kazu<?php print $i; ?>" value="<?php print $kazu[$i]; ?>"></td>*/
    print $pro_price[$i]* $kazu[$i];
    print '円';
    print '<br>';
    /*<td><input type="checkbox" name ="sakujo<?php print $i; ?>"></td>*/
    }
    
    
    
    ?>
        </table>
        <input type="hidden" name="max" value="<?php print $max; ?>">
        <br>
    </form>

    送料は無料です。<br>
    **************************<br>
    <br> 
    代金は以下の口座にお振込みください。<br>
    <br>
    XX銀行　YY支店　普通口座 1234567<br>
    <br>
    入金が確認が取れ次第、以下の住所に発送させていただきます。<br>
    <br>
    <br>
    まるまる商店
    <br>
    <br>
       <a href="shop_list.php">商品一覧へ戻る</a>

</BODY>
</HTML>
<?php
    $_SESSION = array();
    if (isset($_COOKIE[session_name()]) == true){
        setcookie(session_name(),'',time() -42000, '/');
    }
    session_destroy();
?>