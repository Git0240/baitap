<h3>Thông tin về bài dịch vụ</h3>
<form name="frm" method="post" action="index.php?com=dichvu&act=save" enctype="multipart/form-data" class="nhaplieu">
    
    <b>Tiêu đề</b>
	<input type="text" name="tieude" value="<?=@$item_mot['tieude']?>" class="input" /><br />
    
    <b>Nội dung bài viết</b>
   
   	<br />
	<br />
        <textarea class="ckeditor" name="noidung" id="nd" rows="100" cols="40"><?= @$item_mot['noidung'] ?></textarea>
    

    <script src="ckeditor/ckeditor.js"></script>
    
    <input type="hidden" name="id" id="id" value="<?=@$item_mot['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=dichvu&act=man'" class="btn" />
</form>