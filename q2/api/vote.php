<?php include_once "../db.php";
// $_POST['opt']得到的是選項id，透過他來找到這一筆選項
// 從這個選項的count使count+1
$opt=$Que->find($_POST['opt']);
$opt['count']=$opt['count']+1;
// 從這個選項的subject_id去撈出這個選項的題目的那一筆要讓count也加1
$subject=$Que->find($opt['subject_id']);
$subject['count']=$subject['count']+1;


$Que->save($opt);
$Que->save($subject);

header("location:../result.php?id={$subject['id']}")

?>