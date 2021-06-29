<h3>Thông tin</h3>

<form name="frm" method="post" action="index.php?com=doitac&act=save" enctype="multipart/form-data" class="nhaplieu">
    <b style="display:none;">Link: </b>
    <input style="display:none;" type="text" name="tendoitac" value="<?= @$item['tendoitac'] ?>" class="input" />
    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại:</b><img src="<?= _upload_hang . $item['hinh'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
    <br />
    <b>Hình ảnh:</b> <input type="file" name="file" /> <span style="font-weight:bold;"></span><br /><br />
    
	<b>Tên album: </b>
    <input type="text" name="ten" value="<?= @$item['ten'] ?>" class="input" /><br /><br />
	
	<b>url album: </b>
    <input type="text" name="url" value="<?= @$item['url'] ?>" class="input" /><br /><br />
	
<div style="display:none;">		
	<b>Thuộc menu chụp ảnh: </b><input type="checkbox" name="chupanh" <?= (!isset($item['chupanh']) || $item['chupanh'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	<b>Thuộc menu BST váy cưới: </b><input type="checkbox" name="vaycuoi" <?= (!isset($item['vaycuoi']) || $item['vaycuoi'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />

	
	<b>Chọn mục menu cho nhóm</b>
    <?php
    echo "<select name=\"parentid\" id=\"parentid\">";
    print '<option value="' . @$item['parentid'] . '">Menu Chính </option>';
    for ($i = 0, $count = count($items); $i < $count; $i++) {
        print '<option value="' . $items[$i]['id'] . '">' . $items[$i]['ten'] . '</option><br/>';
    }
	print '<option value="0">Không chọn</option>';
    echo "</select>";
    ?><br/><br />
	
	<b>Nội dung nếu có</b><br /><br />
	<textarea class="ckeditor" name="tomtat" cols="100" rows="5" id="tomtat"><?= @$item['tomtat'] ?></textarea><br /><br />
</div>
	
	
	
    
    <br>
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=doitac&act=man'" class="btn" />
</form>