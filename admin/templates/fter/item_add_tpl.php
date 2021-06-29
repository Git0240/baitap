<h3>Thông tin footer</h3>

<form name="frm" method="post" action="index.php?com=fter&act=save" enctype="multipart/form-data" class="nhaplieu">
    <b>Địa chỉ: </b>

    <input type="text" name="dc" value="<?= @$item['dc'] ?>" class="input" /><br />
    <b>Số điện thoại:</b>
    <input type="text" name="dt" value="<?= @$item['dt'] ?>" class="input" /><br />

   <br/>


    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" /><!--neu cai nay sinh thi no them moi va hok lay duoc id--->
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=fter&act=man'" class="btn" />
</form>