<?php
include_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問卷結果</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <header class="p-5">
        <h1 class="text-center">問卷結果</h1>
    </header>
    <main class="container">

        <?php
        // 從index帶的id，$_GET['id']知道是哪一個資料庫裡面的subject
        $subject = $Que->find($_GET['id']);
        ?>
        <h2 class="text-center">目前位置：首頁 > 問卷結果 > <?= $subject['text']; ?></h2>
        <form action="add_vote.php" method="post">
            <ul class="list-group col-6 mx-auto">
                <?php
                $opts = $Que->all(['subject_id' => $_GET['id']]);
                foreach ($opts as $idx => $opt) {
                ?>
                    <li class="list-group-item list-group-item-action">
                        <input type="radio" name="opt" value="<?=$opt['id']?>" id="">
                        <?=$opt['text']?>
                    </li>
                <?php
                }
                ?>

            </ul>
        </form>
        <a class="btn btn-info d-block col-1 mx-auto my-5" href="./index.php">返回</a>

        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/bootstrap.js"></script>
    </main>
</body>

</html>