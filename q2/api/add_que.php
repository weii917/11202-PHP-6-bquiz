<?php include_once "../db.php";


$data =[];
$data['text']=$_POST['subject'];
$data['subject_id']=0;
$data['count']=0;
$data['sh']=1;
// 新增主題，沒有id所以是新增
$Que->save($data);

foreach($_POST['opt'] as $opt){
    // 將陣列清空，要存放選項的值，透過這個陣列用save傳進資料庫
    $data = [];
    $subject_id=$Que->find(['text'=>$_POST['subject']])['id'];
    $data['text']=$opt;
    $data['subject_id']=$subject_id;
    $data['count']=0;
    $data['sh']=1;
    // 新增進資料庫，沒有id所以是新增
    $Que->save($data);
}

header("location:../admin.php");
?>