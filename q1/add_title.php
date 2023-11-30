<?php
include_once "db.php";
// 當title.php點了之後送到這裡執行，如果有圖片存在佔存搬移檔案到我的img命名是本身檔名

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"./img/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}

$_POST['sh']=0;

$Title->save($_POST);

header("location:index.php");
?>
