<?php include_once "../db.php";
if(isset($_GET['id'])){
    // 取得屬於主題那一筆資料的id
    $Que->del($_GET['id']);
    // 給條件subject_id等於subject取得屬於主題那一筆資料的id就知道同一個組，選項才會刪除
    $Que->del(['subject_id'=>$_GET['id']]);
}

header("location:../admin.php");