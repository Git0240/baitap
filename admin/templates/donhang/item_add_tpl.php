<h3>Thông tin hệ điều hành</h3>

<form name="frm" method="post" action="index.php?com=hdh&act=save" enctype="multipart/form-data" class="nhaplieu">
    <b>Tên hệ điều hành: </b>
    <input type="text" name="tenhdh" value="<?= @$item['tenhdh'] ?>" class="input" /><br />
    <input type="hidden" name="id" id="id" value="<?= @$item['id_hdh'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=hdh&act=man'" class="btn" />
</form>