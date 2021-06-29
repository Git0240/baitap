<h3>Thông tin</h3>

<form name="frm" method="post" action="index.php?com=hotline&act=save" enctype="multipart/form-data" class="nhaplieu">
   
    <b>Link:</b>
    <input type="text" name="sdt" value="<?= @$item['sdt'] ?>" class="input" /><br /><br/>
	<b>Tên:</b>
    <input type="text" name="ten" value="<?= @$item['ten'] ?>" class="input" /><br /><br/>
	<b>Nổi bật: </b><input type="checkbox" name="noibat" <?= (!isset($item['noibat']) || $item['noibat'] == 0) ? '' : 'checked="checked"' ?>><br><br />
	
    <br>


    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" /><!--neu cai nay sinh thi no them moi va hok lay duoc id--->
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=hotline&act=man'" class="btn" />
</form>