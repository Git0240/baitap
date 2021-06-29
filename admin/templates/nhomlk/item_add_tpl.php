<h3>Thông tin Liên kết website</h3>

<form name="frm" method="post" action="index.php?com=nlk&act=save" enctype="multipart/form-data" class="nhaplieu">
    <b>Tên Liên kết website </b>
    <input type="text" name="tennlk" value="<?= @$item['tennlk'] ?>" class="input" /><br /><br/>
	
	<b>link</b>
    <input type="text" name="url" value="<?= @$item['url'] ?>" class="input" /><br /><br/>

    <input type="hidden" name="id" id="id" value="<?= @$item['id_nlk'] ?>" /><!--neu cai nay sinh thi no them moi va hok lay duoc id--->
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=loaitin&act=man'" class="btn" />
</form>