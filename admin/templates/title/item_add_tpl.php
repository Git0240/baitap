<h3> Cập nhật tiêu đề website</h3>

<form name="frm" method="post" action="index.php?com=title&act=save" enctype="multipart/form-data" class="nhaplieu">
	
	<b>Title:</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br>
	<b>Title (English):</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /><br>
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=title&act=capnhat'" class="btn" />
</form>