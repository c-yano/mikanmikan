<?php
    session_start();
    session_regenerate_id(true);
    
    require_once('../common/common.php');
    printShopHtmlHeader();
    printShopMemberName();
    
    var_dump($_SESSION);
    
    try {
        $pcode = $_GET['pcode'];
        if (isset($_SESSION['cart']) ==true){
            $cart = $_SESSION['cart'];
            $kazu = $_SESSION['kazu'];
            if (in_array($pcode,$cart) == true){
                print 'その商品はすでにカートに入って入っています。<br>';
                print '<a href="shop_list.php">商品一覧に戻る</a>';
                exit();
            }
        }
        $cart[] = $pcode;
        $kazu[] = 1;
        $_SESSION['cart'] = $cart;
        $_SESSION['kazu'] = $kazu;
    } catch (Exception $e) {
        print 'ただいま障害障害により大変ご迷惑をおかけしております。';
        exit();
    }
?>

    カートに追加しました。<br>
    <br>
    <a href ="shop_list.php">商品一覧に戻る</a>
    </body>
</html>
    