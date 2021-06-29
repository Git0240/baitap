<h3>Thêm hai banner quảng cáo</h3>

<form name="frm" method="post" action="index.php?com=an&act=save" enctype="multipart/form-data" class="nhaplieu">


    <br />

    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Banner hiện tại bên trái:</b><img src="<?= _upload_sanpham . $item['trai'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
    <br />
    
    
    <b>Banner bên trái:</b> <input type="file" name="file" /> <?= _news_type ?><br /><br />
    
    <b>Link Quảng cáo bên trái </b> <input type="text" name="link_trai" value="<?= @$item['link_trai'] ?>" class="input" /><br />
     <b>Link Quảng cáo bên phải </b> <input type="text" name="link_phai" value="<?= @$item['link_phai'] ?>" class="input" /><br />
    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Banner quảng cáo hiện tại bên phải: </b><img src="<?= _upload_sanpham . $item['phai'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
    <br>
     <b>Banner quảng cáo bên phải:</b> <input type="file" name="phai" /><br /><br />
    <br>
    <br>

   
	<b>Hiển thị ra ngoài: </b> <input type="checkbox" name="publish" <?= (!isset($item['publish']) || $item['publish'] == 1) ? 'checked="checked"' : '' ?>><br />
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=an&act=man'" class="btn" />
</form>