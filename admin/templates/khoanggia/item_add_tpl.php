<h3>Thông tin khoảng giá</h3>

<form name="frm" method="post" action="index.php?com=kg&act=save" enctype="multipart/form-data" class="nhaplieu">
    <b>Tên khoảng giá: </b>
    <input type="text" name="tenkg" value="<?= @$item['tenkg'] ?>" class="input" /><br />
    <input type="hidden" name="id" id="id" value="<?= @$item['id_kg'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=kg&act=man'" class="btn" />
</form>