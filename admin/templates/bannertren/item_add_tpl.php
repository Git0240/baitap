  <div class="col-xs-12">

	<div class="box">
                <div class="box-header"><h3 class="box-title">Thông tin về bài Bài viết liên hệ</h3></div><!-- /.box-header -->
                <div class="box-body">
				
<form name="frm" method="post" action="index.php?com=bannertren&act=save" enctype="multipart/form-data" class="nhaplieu form-horizontal">
	
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Link </label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Link " name="url" value="<?= @$item_mot['url'] ?>">
                      </div>
                    </div>
					
					
				<?php if (@$_REQUEST['act'] == 'edit') { ?>					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình hiện tại:</label>
                      <div class="col-sm-10">
                        <img src="<?= _upload_sl . $item['photo'] ?>" alt="NO PHOTO"  width="150"/>
                      </div>
                    </div>
				<?php } ?>
	
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh:</label>
                      <div class="col-sm-10">
                        <input type="file" name="file" />
                      </div>
                    </div>
					
    <input type="hidden" name="id" id="id" value="<?= @$item['id'] ?>" />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location = 'index.php?com=bannertren&act=man'" class="btn" />
</form>

</div>
</div></div>