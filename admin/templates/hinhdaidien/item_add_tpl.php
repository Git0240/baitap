
  <div class="col-xs-12">

	<div class="box">
                <div class="box-header"><h3 class="box-title">Thông tin Bài viết trang chủ</h3></div><!-- /.box-header -->
                <div class="box-body">
				
<form name="frm" method="post" action="index.php?com=hinhdaidien&act=save" enctype="multipart/form-data" class="nhaplieu form-horizontal">
    
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tiêu đề</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Tiêu đề" name="ten" value="<?= @$item['ten'] ?>">
                      </div>
                    </div>
					
					
					<?php if (@$_REQUEST['act'] == 'edit') { ?>					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình hiện tại:</label>
                      <div class="col-sm-10">
                        <img src="<?= _upload_hang . $item['img'] ?>" alt="NO PHOTO"  width="150"/>
                      </div>
                    </div>
				<?php } ?>
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh:</label>
                      <div class="col-sm-10">
                        <input type="file" name="file" />
                      </div>
                    </div>
	


<div style="display:none;">
<b>tóm tắt (SEO)</b> <br><br />
    <div><textarea class="" name="tomtat" cols="50" rows="3" id="mota_vi"><?= @$item['tomtat'] ?></textarea></div>
    <br><br />
	
<b>Chọn Menu:(<span style="color:#FF0000;">*</span>)</b>
    <?php
    echo "<select name=\"id_menu\" id=\"id_menu\">";
	
    print '<option value ="' . @$item['id_menu'] . '">Lựa chọn menu</option>';

    for ($i = 0, $count = count($htdl); $i < $count; $i++) {
        print '<option value="' . $htdl[$i]['id'] . '">' . $htdl[$i]['ten'] . ' - ' . $htdl[$i]['sdt'] . '</option><br/>';
    }
	print '<option value="0">Không chọn</option>';
    echo "</select>";
    ?>
	<br /><br />

</div>

	
    
    <br>
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=hinhdaidien&act=man'" class="btn" />
</form>

</div>
</div></div>