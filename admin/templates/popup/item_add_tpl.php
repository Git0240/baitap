<h3>Thông tin popup home</h3>

<form name="frm" method="post" action="index.php?com=popup&act=save" enctype="multipart/form-data" class="nhaplieu">
    <b>Ẩn hiện: </b>
   	<input type="checkbox" name="anhien" <?= (!isset($item['anhien']) || $item['anhien'] == 0) ? '' : 'checked="checked"' ?>>
   
   <br />
    <br>
    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại:</b><img src="<?= _upload_hang . $item['hinh'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
    <br />
    <b>Hình ảnh:</b> <input type="file" name="file" /> <span style="font-weight:bold;"></span><br /><br />
    
     <b>Link </b>
    <input type="text" name="url" value="<?= @$item['lienket'] ?>" class="input" /><br />
	
    <br>
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=popup&act=man'" class="btn" />
</form>