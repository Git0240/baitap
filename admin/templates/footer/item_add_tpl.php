<h3>Thêm mới</h3>
<form name="frm" method="post" action="index.php?com=footer&act=save" enctype="multipart/form-data" class="nhaplieu">


    <b>Noi dung tiếng Việt</b>
    <div>
        <?php
        $oFCKeditor = new FCKeditor('noidung_vi') ;
        $oFCKeditor->BasePath	= $sBasePath ;
        $oFCKeditor->Height		= 300;
        $oFCKeditor->Value		= $items['noidung_vi'];
        $oFCKeditor->Create() ;
        ?></div><br/>
    <b>Noi dung tiếng Anh</b>
    <div>
        <?php
        $oFCKeditor = new FCKeditor('noidung_en') ;
        $oFCKeditor->BasePath	= $sBasePath ;
        $oFCKeditor->Height		= 300;
        $oFCKeditor->Value		= $items['noidung_en'];
        $oFCKeditor->Create() ;
        ?></div><br/>


    <input type="hidden" name="id" id="id" value="<?=@$items['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=footer&act=man'" class="btn" />
</form>