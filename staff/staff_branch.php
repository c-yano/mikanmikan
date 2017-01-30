<?php

if(isset($_POST['disp']) == true){
      $pcode = $_POST['staffcode'];
      header('Location:staff_disp.php?pcode='.$staffcode);
    exit();
}
if(isset($_POST['add']) == true){
    header('Location:staff_add.php');
    exit();
}

if(isset($_POST['delete']) == true){
      $staffcode = $_POST['staffcode'];
      header('Location:staff_delete.php?staffcode='.$staffcode);
    exit();
}
if(isset($_POST['edit']) == true){
      $staffcode = $_POST['staffcode'];
      header('Location:staff_edit.php?staffcode='.$staffcode);
    exit();
}
?>

