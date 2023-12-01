<h3 class="text-center mt-3">更新標題區圖片</h3>
<hr>
<form action="update_title.php" method="post" enctype="multipart/form-data">
    <table class="col-8 m-auto">
        <tr>
            <td>標題區圖片:</td>
            <td><input type="file" name="img" id=""></td>
            <input type="hidden" name="id" value="<?=$_GET['id'];?>">
            <!-- 從index.php按更新圖片，網址裡帶過來的id有id代表有圖片要更新 -->
        </tr>
    </table>
<div class="text-center">
    <input type="submit" value="更新">
    <input type="reset" value="重置">
</div>
</form>