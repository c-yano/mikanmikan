<?php

if(isset($_POST['disp']) == true){
      $pcode = $_POST['pcode'];
      header('Location:product_disp.php?pcode='.$pcode);
    exit();
}
if(isset($_POST['add']) == true){
    header('Location:product_add.php');
    exit();
}

if(isset($_POST['delete']) == true){
      $pcode = $_POST['pcode'];
      header('Location:product_delete.php?pcode='.$pcode);
    exit();
}
if(isset($_POST['edit']) == true){
      $pcode = $_POST['pcode'];
      header('Location:product_edit.php?pcode='.$pcode);
    exit();
}
?>

