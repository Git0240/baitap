<h3>Thông tin dòng chữ chạy quảng cáo</h3>

<form name="frm" method="post" action="index.php?com=chuchay&act=save" enctype="multipart/form-data" class="nhaplieu">
   
    <b>Dòng chữ chạy quảng cáo:</b>
    <br />
	
	<textarea rows="4" cols="50" name="sdt" class="">
		<?= @$item['chu'] ?>
	</textarea>
	

   <br/>
   <br />
   <b style="display:none;">Link kèm theo</b>
	<input  style="display:none;" type="text" value="<?= @$item['link']?>" name="link" class="input" />
	<br>
	<br>
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" /><!--neu cai nay sinh thi no them moi va hok lay duoc id--->
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=chuchay&act=man'" class="btn" />
</form>