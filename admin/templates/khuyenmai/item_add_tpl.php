<h3>Thông tin về Bài viết giới thiệu</h3>
<form name="frm" method="post" action="index.php?com=khuyenmai&act=save" enctype="multipart/form-data" class="nhaplieu">
    
    <b>Tiêu đề</b>
	<input type="text" name="tieude" value="<?=@$item_mot['tieude']?>" class="input" /><br><br />
    
	<b style="display:none;">Menu trên: </b><input style="display:none;" type="checkbox" name="noibat" <?= (!isset($item_mot['noibat']) || $item_mot['noibat'] == 0) ? '' : 'checked="checked"' ?>>
	
	 <b>Tóm tắt</b>   <br /><br />
     <textarea class="ckeditor" name="tomtat" id="nd" rows="100" cols="40"><?= @$item_mot['tomtat'] ?></textarea>
	
    <b>Nội dung bài viết</b>   <br /><br />
     <textarea class="ckeditor" name="noidung" id="nd" rows="100" cols="40"><?= @$item_mot['noidung'] ?></textarea>
    

    <script src="ckeditor/ckeditor.js"></script>
    
    <input type="hidden" name="id" id="id" value="<?=@$item_mot['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=khuyenmai&act=man'" class="btn" />
</form>