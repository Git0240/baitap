
<div class="col-xs-12">

	<div class="box">
                <div class="box-header"><h3 class="box-title">Thông tin về Thương hiệu</h3></div><!-- /.box-header -->
                <div class="box-body">
				
<form name="frm" method="post" action="index.php?com=hang&act=save" enctype="multipart/form-data" class="nhaplieu form-horizontal">

					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tiêu đề</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Tiêu đề" name="tenhang" value="<?= @$item['tenhang'] ?>">
                      </div>
                    </div>

<div style="display:none;">
    
	<b>mặc định trong nước (tick là nhập khẩu): </b><input type="checkbox" name="trongnuoc" <?= (!isset($item['trongnuoc']) || $item['trongnuoc'] == 0) ? '' : 'checked="checked"' ?>><br><br />
    
	<b>Hot: </b><input type="checkbox" name="hot" <?= (!isset($item['hot']) || $item['hot'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	<b>Sale: </b><input type="checkbox" name="sale" <?= (!isset($item['sale']) || $item['sale'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	<b>New: </b><input type="checkbox" name="new" <?= (!isset($item['new']) || $item['new'] == 0) ? '' : 'checked="checked"' ?>>
    <br><br />
	
	<br>
    <b>Link </b>
    <input type="text" name="href" value="<?= @$item['href'] ?>" class="input" /><br /><br />
</div>
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">tóm tắt</label>
                      <div class="col-sm-10">
						<textarea name="tomtat" class="form-control" cols="50" rows="3" id="mota_vi"><?= @$item['tomtat'] ?></textarea>
                      </div>
                    </div>
	
    
    <br>
    
    
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
    
    <br>
    <input type="hidden" name="id" id="id" value="<?= @$item['id_hang'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=hang&act=man'" class="btn" />
</form>

</div></div></div>