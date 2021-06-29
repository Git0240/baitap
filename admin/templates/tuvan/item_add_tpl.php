

<h3>Thông tin về bài tư vấn</h3>
<form name="frm" method="post" action="index.php?com=tuvan&act=save" enctype="multipart/form-data" class="nhaplieu">
    
	<b>Xuất ra ngoài: </b>
	 <input type="checkbox" name="publish" <?= (!isset($item_mot['publish']) || $item_mot['publish'] == 0) ? '' : 'checked="checked"' ?>><br />
	
    <b>Họ tên Tên</b>
	<input type="text" name="hoten" value="<?=@$item_mot['hoten']?>" class="input" /><br />
    <b>Email</b>
	<input type="text" name="email" value="<?=@$item_mot['email']?>" class="input" /><br />
	<b>Địa chỉ</b>
	<input type="text" name="diachi" value="<?=@$item_mot['diachi']?>" class="input" /><br />
	
	<b>Câu hỏi</b>
	 <div><textarea name="cauhoi" cols="50" rows="3" id="cauhoi"><?= @$item_mot['cauhoi'] ?></textarea></div><br />
	 
	<br /><br />
	<b>Trả lời</b>
	 <p>
        <textarea class="ckeditor_quoc" name="traloi" id="nd" rows="" cols="40"><?= @$item_mot['traloi'] ?></textarea>
    </p>

    <?php
    include_once ('ckeditor/ckeditor.php');
    require_once ('ckfinder/ckfinder.php');
		
	$ckeditor = new CKEditor('traloi'); //gá»� dá»� tuong truoc 
    $ckeditor->basePath = 'upload'; //lay duong dan mac dinh
    CKFinder::SetupCKEditor($ckeditor, 'ckfinder/');
   $ckeditor->replace("traloi");

	
    ?> 
   
    
    <input type="hidden" name="id" id="id" value="<?=@$item_mot['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=tuvan&act=man'" class="btn" />
</form>