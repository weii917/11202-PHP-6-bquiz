<?php include_once "../db.php";
// $_POST['opt']得到的是選項id，透過他來找到這opt那一筆
$opt=$Que->find($_POST['opt']);
$opt['count']=$opt['count']+1;

$subject=$Que->find($opt['subject_id']);
$subject['count']=$subject['count']+1;


$Que->save($opt);
$Que->save($subject);

header("location:../result.php?id={$subject['id']}")

?>