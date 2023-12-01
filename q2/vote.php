<?php
include_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問卷投票</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <header class="p-5">
        <h1 class="text-center">問卷投票</h1>
    </header>
    <main class="container">

        <?php
        // 從index帶的id，$_GET['id']知道是哪一個資料庫裡面的問題
        // 找到那一行問題的陣列存進subject
        $subject = $Que->find($_GET['id']);
        ?>
        <h2 class="text-center"><?= $subject['text']; ?></h2>
        <form action="./api/vote.php" method="post">
            <ul class="list-group col-6 mx-auto">
                <?php  
                // 找到所有符合subject_id的值是資料庫裡面的問題的id，依序找到那個問題的所有每一筆選項
                $opts = $Que->all(['subject_id' => $_GET['id']]);
                foreach ($opts as $idx => $opt) {
                ?>
                    <li class="list-group-item list-group-item-action">
                        <!-- 會把opt選項的id存到post['opt']，知道是哪個選項的id被選擇到 -->
                        <input type="radio" name="opt" value="<?= $opt['id'] ?>" id="">
                        <?= $opt['text'] ?>
                    </li>
                <?php
                }
                ?>

            </ul>
            <input type="submit" value="我要投票" class="btn btn-primary d-block mx-auto my-5">
        </form>

        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/bootstrap.js"></script>
    </main>
</body>

</html>