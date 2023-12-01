<?php
// upload_title更新導入到update_title
// upload_title form POST裡有id，檢查POST存在id就透過這個id撈資料庫資料存在row，
// 判斷FILES裡的tmp_name不是空的，執行搬移圖片到img用圖片檔名放進img資料夾，並且更新資料庫的img['name']
include_once "db.php";
if(isset($_POST['id'])){
    $row=$Title->find($_POST['id']);

    if(!empty($_FILES['img']['tmp_name'])){
        move_uploaded_file($_FILES['img']['tmp_name'],'./img/'.$_FILES['img']['name']);
        $row['img']=$_FILES['img']['name'];
        $Title->save($row);
    }
}

header("location:index.php");

?>