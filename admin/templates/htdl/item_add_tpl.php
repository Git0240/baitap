<h3>Thông tin menu</h3>

<form name="frm" method="post" action="index.php?com=htdl&act=save" enctype="multipart/form-data" class="nhaplieu">
    <b>Tên dòng 1: </b>
    <input type="text" name="ten" value="<?= @$item['ten'] ?>" class="input" /><br /><br />
    <b>tên dòng 2:</b>
    <input type="text" name="sdt" value="<?= @$item['sdt'] ?>" class="input" /><br /><br />



   <br/>


    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" /><!--neu cai nay sinh thi no them moi va hok lay duoc id--->
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=htdl&act=man'" class="btn" />
</form>