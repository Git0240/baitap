<h3>Thông tin về bài Giới thiệu trang chủ</h3>
<form name="frm" method="post" action="index.php?com=tuyendung&act=save" enctype="multipart/form-data" class="nhaplieu">
    
    <b>Tiêu đề</b>
	<input type="text" name="tieude" value="<?=@$item_mot['tieude']?>" class="input" /><br /><br />
    
    <b>Nội dung bài viết</b>
   
   	<br />
	<br />
        <textarea class="ckeditor" name="noidung" id="nd" rows="100" cols="40"><?= @$item_mot['noidung'] ?></textarea>
    
    
    <input type="hidden" name="id" id="id" value="<?=@$item_mot['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=tuyendung&act=man'" class="btn" />
</form>