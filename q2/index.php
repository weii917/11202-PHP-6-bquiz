<?php
include_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問卷調查</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <header class="p-5">
        <h1 class="text-center">問卷調查</h1>
    </header>
    <main class="container">
        <fieldset>
            <legend>目前位置：首頁 > 問卷調查</legend>
            <table class="table">
                <tr>
                    <th>編號</th>
                    <th>問卷題目</th>
                    <th>投票總數</th>
                    <th>結果</th>
                    <th>狀態</th>
                    <?php
                    // 撈出'subject_id'=0的所有資料存進$ques陣列
                    // 逐筆顯示$ques 每一筆索引$idx，值$que陣列，依序用$que['資料表欄位']拿到值放進列表位置                
                    $ques = $Que->all(['subject_id' => 0]);
                    foreach ($ques as $idx => $que) {
                    ?>
                <tr>
                    <!-- $que是那一行問題的一維陣列 所以可以取資料表裡的欄位裡的值-->
                    <!-- 每一個題目選項id都是唯一的 -->
                    <td><?= $idx + 1; ?></td>
                    <td><?= $que['text'] ?></td>
                    <td><?= $que['count'] ?></td>
                    <td><a class="btn btn-success" href="result.php?id=<?= $que['id'] ?>">投票結果</a></td>
                    <!-- 將$que['id']放進網址傳到我要投票知道要投屬於哪個的id是問題-->
                    <td><a class="btn btn-info" href="vote.php?id=<?= $que['id'] ?>">我要投票</a></td>
                </tr>
            <?php
                    }
            ?>
            </table>
        </fieldset>
        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/bootstrap.js"></script>
    </main>
</body>

</html>