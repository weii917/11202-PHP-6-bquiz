<?php
include_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問卷管理後台</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <header class="container p-5">
        <h1 class="text-center">問卷管理</h1>
    </header>
    <main class="container p-3">
        <!-- 新增問卷位置 -->
        <fieldset>
            <legend>新增問卷</legend>
            <form action="./api/add_que.php" method="post">
                <!-- 主題 -->
                <div class="d-flex">
                    <div class="col-3 bg-light p-2">問卷名稱</div>
                    <div class="col-6 p-2">
                        <input type="text" name="subject" id="">
                    </div>
                </div>
                <!-- 選項 -->
                <div class="bg-light">
                    <div class="p-2" id="option">
                        <label for="">選項</label>
                        <input type="text" name="opt[]">
                        <input type="button" value="更多" onclick="more()">
                    </div>
                </div>
                <div>
                    <input type="submit" value="新增">
                    <input type="reset" value="清空">
                </div>
            </form>
        </fieldset>
        <!-- 題目選項列表位置 -->
        <fieldset>
            <legend>問卷列表</legend>
            <div class="col-9 mx-auto">
                <table class="table">
                    <tr>
                        <td>編號</td>
                        <td>主題內容</td>
                        <td>操作</td>
                    </tr>
                    <?php
                    // 撈出'subject_id'=0的所有資料存進$ques陣列
                    // 逐筆顯示$ques 每一筆，依序放進列表位置
                    //$ques二維陣列0->$que第一陣列 1->$que第二陣列
                    $ques = $Que->all(['subject_id' => 0]);                
                    foreach ($ques as $idx => $que) {
                    ?>
                        <tr>
                            <!-- 因索引是0，為了方便顯示從1開始所以加1 -->
                            <td><?= $idx + 1; ?></td>
                            <!-- 取得$que的['text'] 與 $que['id']取得屬於主題id知道刪除id-->
                            <td><?= $que['text']; ?></td>
                            <td><a href=""></a><button class="btn btn-info">顯示</button>
                                <button class="btn btn-success">編輯</button>
                                <a href="./api/del.php?id=<?= $que['id']; ?>">
                                    <button class="btn btn-danger">刪除</button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>

            </div>

        </fieldset>
    </main>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>

</html>

<script>
    function more() {
        let opt = `<div class="p-2">
                    <label for="">選項</label>
                    <input type="text" name="opt[]">                     
                </div>`
        $("#option").before(opt)
    }
</script>