<h3>Thông tin về bài đối tác</h3>
<form name="frm" method="post" action="index.php?com=doitac&act=save" enctype="multipart/form-data" class="nhaplieu">
    
    <b>Tiêu đề</b>
	<input type="text" name="tieude" value="<?=@$item_mot['tieude']?>" class="input" /><br />
    
        <b>Nội dung bài viết</b>
   
    <p>
        <textarea class="ckeditor_quoc" name="noidung" id="nd" rows="100" cols="40"><?= @$item_mot['noidung'] ?></textarea>
    </p>

    <script type=text/javascript>//CKEDITOR.replace( â€˜noi_dungâ€˜); </script>
    <?php
    include_once ('ckeditor/ckeditor.php');
    require_once ('ckfinder/ckfinder.php');
    $ckeditor = new CKEditor('chitiet'); //gá»� dá»� tuong truoc 
    $ckeditor->basePath = '/images/'; //lay duong dan mac dinh
    CKFinder::SetupCKEditor($ckeditor, 'ckfinder/');
    $ckeditor->replace("noidung");

//chen file php vo  trong trang wweb
    ?>  
    
    <input type="hidden" name="id" id="id" value="<?=@$item_mot['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=doitac&act=man'" class="btn" />
</form>