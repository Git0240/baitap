<h3>Thông tin hỗ trơ kinh doanh</h3>

<form name="frm" method="post" action="index.php?com=htkd&act=save" enctype="multipart/form-data" class="nhaplieu">
    <b>Tên: </b>
    <input type="text" name="ten" value="<?= @$item['ten'] ?>" class="input" /><br /> <br/>


    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" /><!--neu cai nay sinh thi no them moi va hok lay duoc id--->
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=htkd&act=man'" class="btn" />
</form>