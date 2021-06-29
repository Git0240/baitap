<h3>Thông tin Menug</h3>

<form name="frm" method="post" action="index.php?com=tbmang&act=save" enctype="multipart/form-data" class="nhaplieu">
    <b>Tên Menu</b>
    <input type="text" name="ten" value="<?= @$item['ten'] ?>" class="input" /> <br><br />

<div style="display:none;">
	<b>menu trên: </b><input type="checkbox" name="tren" <?= (!isset($item['tren']) || $item['tren'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	<b>menu dưới: </b><input type="checkbox" name="duoi" <?= (!isset($item['duoi']) || $item['duoi'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
</div>

    <input type="hidden" name="id" id="id" value="<?= @$item['id_tbm'] ?>" /><!--neu cai nay sinh thi no them moi va hok lay duoc id--->
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=tbmang&act=man'" class="btn" />
</form>