<h3>Sữa hai banner quảng cáo</h3>

<form name="frm" method="post" action="index.php?com=an&act=save" enctype="multipart/form-data" class="nhaplieu">
  
    
    
    <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Banner hiện tại bên trái:</b><img src="<?= _upload_hang . $item['trai'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
    <br />
    <b>Banner bên trái:</b> <input type="file" name="file" /> <?= _news_type2 ?><br /><br />
    <br>
    <br>
     <?php if (@$_REQUEST['act'] == 'edit') {
        ?>
        <b>Banner hiện tại bên phải:</b><img src="<?= _upload_hang . $item['phai'] ?>" alt="NO PHOTO"  width="150"/><br />
    <?php } ?>
    <br />
    <b>Banner bên phải:</b> <input type="file" name="phai" /> <?= _news_type2 ?><br /><br />
    
    <br>
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=an&act=man'" class="btn" />
</form>