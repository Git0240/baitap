<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=img&act=save_photo&id=<?=$_REQUEST['id'];?>&idc=<?=$_REQUEST['idc']?>" enctype="multipart/form-data" class="nhaplieu">
	
	<b>Danh mục</b><?=$list_cat?><br /><br />
    
     <b>Hình hiện tại:</b>   <img src="<?=_upload_album.$item['photo']?>" width="100" />
    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <?=_hinhanh_type?><br />
	
    <br />
	<b>Tên: </b> <input name="mota" value="<?=$item['mota']?>" type="text" size="40"   />	
	<br />
    
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?=$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?=$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=img&act=man_photo'" class="btn" />
</form>