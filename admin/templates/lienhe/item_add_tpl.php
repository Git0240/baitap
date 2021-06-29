<h3>Thông tin khách hàng liên hệ</h3>

<form name="frm" method="post" action="index.php?com=lienhe&act=save" enctype="multipart/form-data" class="nhaplieu">
    
	<b>Xuất ý kiến khách hàng ra trang chủ: </b><input type="checkbox" name="thanhtoan" <?= (!isset($item_mot['thanhtoan']) || $item_mot['thanhtoan'] == 0) ? '' : 'checked="checked"' ?>>
	<br /> <br />
     <input type="hidden" name="id" id="id" value="<?= @$item_mot['id'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=lienhe&act=man'" class="btn" />
</form>