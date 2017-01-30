<?php
   
    session_start();
    session_regenerate_id(true);
    
    require_once('../common/common.php');
    printShopHtmlHeader();
    printShopMemberName();
    
    var_dump($_SESSION);
    
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
            if($rec['gazou']== ''){
                $pro_gazou[]='';
            } else{
                $pro_gazou[] ='<img src="../gazou/'.$rec['gazou'].'">';
            }
        }
        $dbh = null;
         
    }catch(Exception $e){
        print'ただいま障害により大変ご迷惑おかけしております。';
        exit();
    }
?>
    <br>
    カートの中身<br>
    <br>
    <form method="post" action ="kazu_change.php">
        <table border="1">
            <tr>
                <td>商品</td>
                <td>商品画像</td>
                <td>価格</td>
                <td>数量</td>
                <td>小計</td>
                <td>削除</td>
            </tr>
            <?php
                for ($i=0; $i < $max; $i++) {
            ?>
                <tr>
                    <td><?php print $pro_name[$i]; ?></td>
                    <td><?php print $pro_gazou[$i]; ?></td>
                    <td><?php print $pro_price[$i]; ?>円</td>
                    <td><input type="text" name ="kazu<?php print $i; ?>" value="<?php print $kazu[$i]; ?>"></td>
                    <td><?php print $pro_price[$i]* $kazu[$i]; ?>円</td>
                    <td><input type="checkbox" name ="sakujo<?php print $i; ?>"></td>
                </tr>
            <?php
                }
            ?>
        </table>
        <input type="hidden" name="max" value="<?php print $max; ?>">
        <br>
        <br>
        <input type="submit" value="数量変更"><br>
    </form>
        <br>
        <br>
        <a href="shop_list.php">商品一覧へ戻る</a>
        <br>
        <br>
        <a href="shop_form.php">ご購入手続きへ進む</a>

    
</body>
</html>