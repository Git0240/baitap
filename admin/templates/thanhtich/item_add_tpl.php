<h3>Thông tin về thành tích</h3>

<form name="frm" method="post" action="index.php?com=thanhtich&act=save" enctype="multipart/form-data" class="nhaplieu">
    <b>Tên hãng: </b>
    <input type="text" name="tenthanhtich" value="<?= @$item['tenthanhtich'] ?>" class="input" /><br />
    <br>
    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Hình hiện tại:</b><img src="<?= _upload_hang . $item['hinh'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
    <br />
    <b>Hình ảnh:</b> <input type="file" name="file" /> <span style="font-weight:bold;"></span><br /><br />
    
    
    <br>
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=thanhtich&act=man'" class="btn" />
</form>