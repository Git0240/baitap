<h3>Thêm slide</h3>

<form name="frm" method="post" action="index.php?com=slide&act=save" enctype="multipart/form-data" class="nhaplieu">
	
   
<br />
   <?php if (@$_REQUEST['act']=='edit')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_tintuc.$item['photo']?>" alt="NO PHOTO"  width="150"/><br />
	<?php }?>
    <br />
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?=_slide_type?><br /><br />
	<b>Tiêu đề</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br />
	<b>Tiêu đề English</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br />
   <b>Mô tả</b>
	<div><textarea name="mota_vi" cols="50" rows="3" id="mota_vi"><?=@$item['mota_vi']?></textarea></div>
	<b>Mô tả (English)</b>
	<div><textarea name="mota_en" cols="50" rows="3" id="mota_en"><?=@$item['mota_en']?></textarea></div>

	
	<b>Nội dung</b>
	<div>
	<?php
	$oFCKeditor = new FCKeditor('noidung_vi') ;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Height		= 300;
	$oFCKeditor->Value		= @$item['noidung_vi'];
	$oFCKeditor->Create() ;
	?>
	</div>
	<b>Nội dung (English)</b>
	<div>
	<?php
	$oFCKeditor = new FCKeditor('noidung_en') ;
	$oFCKeditor->BasePath	= $sBasePath ;
	$oFCKeditor->Height		= 300;
	$oFCKeditor->Value		= @$item['noidung_en'];
	$oFCKeditor->Create() ;
	?>
	</div>
	
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=slide&act=man'" class="btn" />
</form>