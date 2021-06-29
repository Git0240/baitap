<h3>Thông tin title , keyword , description</h3>
<form name="frm" method="post" action="index.php?com=gamenet&act=save" enctype="multipart/form-data" class="nhaplieu">
    
	<span>---------------SEO-----------------------</span>
	<br />
	
	<b>Tên trang: <span style="color:#FF0000;"><?= @$item_mot['tentrang'] ?></span></b>
	
	<br /><br /><br />
	<b>tentrang</b>  <div><textarea name="tentrang" cols="50" id="tentrang"><?= @$item_mot['tentrang'] ?></textarea></div><br />
	 <b>title</b>  <div><textarea name="title" cols="50" id="title"><?= @$item_mot['title'] ?></textarea></div><br />
	 <b>keyword</b>  <div><textarea name="keyword" cols="50" id="keyword"><?= @$item_mot['keyword'] ?></textarea></div><br />
	 <b>description</b>  <div><textarea name="description" cols="50" id="description"><?= @$item_mot['description'] ?></textarea></div><br />
	
	
	<span>----------------------------------------</span><br />
		
    <b style="display:none;">Tiêu đề</b>
	<input style="display:none;" type="text" name="tieude" value="<?=@$item_mot['tieude']?>" class="input" /><br />
    
        <b style="display:none;">Nội dung bài viết</b>
   
    <p style="display:none;">
        <textarea style="display:none;" class="ckeditor_quoc" name="noidung" id="nd" rows="100" cols="40"><?= @$item_mot['noidung'] ?></textarea>
    </p>


    
    <input type="hidden" name="id" id="id" value="<?=@$item_mot['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=gamenet&act=man'" class="btn" />
</form>